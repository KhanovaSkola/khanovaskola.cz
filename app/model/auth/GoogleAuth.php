<?php

class GoogleAuth extends Nette\Object implements \Nette\Security\IAuthenticator
{

	/** @var Google */
	protected $google;

	/** @var Table\Users */
	protected $users;



	public function __construct(Google $google, Users $users)
	{
		$this->google = $google;
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
		if (!$user) {
			$user = $this->users->insert([
				'name' => $info->name,
				'google_id' => $info->id,
				'mail' => $info->email,
				'role' => '',
			]);
		}

		$roles = explode(';', $user->role);
		$roles[] = 'google';

		return new \Nette\Security\Identity($user->id, $roles, []);
	}

}
