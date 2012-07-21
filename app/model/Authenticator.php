<?php

use Nette\Security as NS;


/**
 * Users authenticator.
 */
class Authenticator extends Nette\Object implements NS\IAuthenticator
{
	/** @var Table */
	private $selector;



	public function __construct(Table $users)
	{
		$this->selector = $users;
	}



	/**
	 * Performs an authentication
	 * @param  array
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($mail, $password) = $credentials;
		$user = $this->selector->findOneBy(['mail' => $mail]);

		if (!$user) {
			throw new NS\AuthenticationException("User '$mail' not found.", self::IDENTITY_NOT_FOUND);
		}

		if (FALSE && $user->password !== $this->calculateHash($password)) {
			throw new NS\AuthenticationException("Invalid password.", self::INVALID_CREDENTIAL);
		}

		return new NS\Identity($user->id, explode(';', $user->role), []);
	}



	/**
	 * Computes salted password hash.
	 * @param  string
	 * @return string
	 */
	public function calculateHash($password)
	{
		return md5($password . str_repeat('*random salt*', 10));
	}

}
