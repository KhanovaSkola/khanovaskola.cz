<?php

namespace Authenticator;


class Google extends \Nette\Object implements \Nette\Security\IAuthenticator
{

	/** @var Table\Users */
	protected $users;



	public function __construct(\Selector\Users $users)
	{
		$this->users = $users;
	}


	/**
	 * @param array $data Google::getInfo()
	 * @return Nette\Security\Identity
	 */
	public function authenticate(array $data)
	{
		$info = end($data);
		$user = $this->users->findOneBy(['google_id' => $info->id]);

		// If user with this email exists, link the accounts
		if (!$user) {
			$user = $this->users->findOneBy(['mail' => $info->email]);
			if ($user) {
				$user->google_id = $info->id;
				$user->update();
			}
		}

		// otherwise, register new user
		$new = FALSE;
		if (!$user) {
			$user = $this->users->insert([
				'name' => $info->name,
				'google_id' => $info->id,
				'mail' => $info->email,
				'registration' => time(),
				'role' => '',
			]);
			$new = TRUE;
		}

		$roles = explode(';', $user->role);
		$roles[] = 'google';
		if ($new) {
			$roles[] = 'new-user';
		}

		return new \Nette\Security\Identity($user->id, $roles, []);
	}

}
