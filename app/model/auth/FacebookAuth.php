<?php

class FacebookAuth extends Nette\Object implements \Nette\Security\IAuthenticator
{

	/** @var Facebook */
	protected $facebook;

	/** @var Table\Users */
	protected $users;



	public function __construct(Facebook $facebook, Users $users)
	{
		$this->facebook = $facebook;
		$this->users = $users;
	}


    /**
     * @param array $info Facebook::api('/me')
     * @return Nette\Security\Identity
     */
    public function authenticate(array $info)
	{
		$id = (int) $info['id'];

		$user = $this->users->findOneBy(['facebook_id' => $id]);

		// If user with this email exists, link the accounts
		if (!$user) {
			$user = $this->users->findOneBy(['mail' => $info['email']]);
			if ($user) {
				$user->facebook_id = $id;
				$user->update();
			}
		}

		// otherwise, register new user
		if (!$user) {
			$user = $this->users->insert([
				'name' => $info['name'],
				'facebook_id' => (int) $info['id'],
				'mail' => $info['email'],
				'role' => '',
			]);
		}

		$roles = explode(';', $user->role);
		$roles[] = 'facebook';

		return new \Nette\Security\Identity($user->id, $roles, []);
	}

}
