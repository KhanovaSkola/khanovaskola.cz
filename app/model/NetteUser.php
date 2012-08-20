<?php

class NetteUser extends \Nette\Security\User
{

	/** @var Users */
	protected $users;

	/** @var FacebookAuth */
	protected $facebookAuth;

	/** @var PasswordAuth */
	protected $passwordAuth;



	public function __construct(\Nette\Security\IUserStorage $storage, \Nette\DI\Container $context, Users $users, FacebookAuth $facebookAuth, PasswordAuth $passwordAuth)
	{
		parent::__construct($storage, $context);

		$this->users = $users;
		$this->facebookAuth = $facebookAuth;
		$this->passwordAuth = $passwordAuth;
	}



	/**
	 * @return User
	 */
	public function getEntity()
	{
		return $this->users->findOneBy(['id' => $this->id]);
	}



	/**
	 * @return bool
	 */
	public function isModerator()
	{
		return $this->isInRole('moderator');
	}



	/**
	 * @return bool
	 */
	public function isAdmin()
	{
		return $this->isInRole('admin');
	}



	/**
	 * @return bool
	 */
	public function isLoggedInWithFacebook()
	{
		return $this->isInRole('facebook');
	}



	/**
	 * Conducts the authentication process. Parameters are optional.
	 * @param  mixed optional parameter (e.g. username or IIdentity)
	 * @param  mixed optional parameter (e.g. password)
	 * @return void
	 * @throws AuthenticationException if authentication was not successful
	 */
	public function login($id = NULL, $password = NULL)
	{
		$this->logout(TRUE);
		if (!$id instanceof IIdentity) {
			if (func_num_args() === 1) {
				$this->setAuthenticator($this->facebookAuth);
				$id = $this->getAuthenticator()->authenticate($id);

			} else {
				$this->setAuthenticator($this->passwordAuth);
				$id = $this->getAuthenticator()->authenticate(func_get_args());
			}
		}
		$this->storage->setIdentity($id);
		$this->storage->setAuthenticated(TRUE);
		$this->onLoggedIn($this);
	}

}
