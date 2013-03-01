<?php

/**
 * @property User $entity
 */
class NetteUser extends \Nette\Security\User
{

	const ROLE_ADMIN = 'admin';
	const ROLE_ADMINER = 'adminer';
	const ROLE_ADDER = 'adder';
	const ROLE_EDITOR = 'editor';
	const ROLE_BLOG = 'blog';
	const ROLE_VERIFIER = 'verifier';



	/** @var Users */
	protected $users;

	/** @var FacebookAuth */
	protected $facebookAuth;

	/** @var GoogleAuth */
	protected $googleAuth;

	/** @var PasswordAuth */
	protected $passwordAuth;



	public function __construct(\Nette\Security\IUserStorage $storage, \Nette\DI\Container $context, Users $users, FacebookAuth $facebookAuth, GoogleAuth $googleAuth, PasswordAuth $passwordAuth)
	{
		parent::__construct($storage, $context);

		$this->users = $users;
		$this->facebookAuth = $facebookAuth;
		$this->googleAuth = $googleAuth;
		$this->passwordAuth = $passwordAuth;
	}



	/**
	 * @return User
	 */
	public function getEntity()
	{
		return $this->users->find($this->id);
	}



	/**
	 * @return bool
	 */
	public function isLoggedInWithFacebook()
	{
		return $this->isInRole('facebook');
	}



	protected function loginWith(\Nette\Security\IAuthenticator $auth, array $id)
	{
		$this->logout(TRUE);
		if (!$id instanceof IIdentity) {
			$this->setAuthenticator($auth);
			$id = $this->getAuthenticator()->authenticate($id);
		}
		$this->storage->setIdentity($id);
		$this->storage->setAuthenticated(TRUE);
		$this->onLoggedIn($this);

		$entity = $this->getEntity();
		$entity->last_login = time();
		$entity->update();
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
		return $this->loginWith($this->passwordAuth, func_get_args());
	}



	public function facebookLogin($info)
	{
		return $this->loginWith($this->facebookAuth, $info);
	}



	public function googleLogin($info)
	{
		return $this->loginWith($this->googleAuth, [$info]);
	}

}
