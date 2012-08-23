<?php

use Nette\Security as NS;


/**
 * Users authenticator.
 */
class PasswordAuth extends Nette\Object implements NS\IAuthenticator
{

	/** @var Users */
	private $users;



	public function __construct(Users $users)
	{
		$this->users = $users;
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
		$user = $this->users->findOneBy(['mail' => $mail]);

		if (!$user) {
			throw new NS\AuthenticationException("Uživatel „{$mail}“ neexistuje.", self::IDENTITY_NOT_FOUND);
		}

		if (!$user->password) {
			$services = [];
			if ($user->facebook_id) {
				$services[] = 'Facebook';
			}
			if ($user->google_id) {
				$services[] = 'Google';
			}

			throw new NS\AuthenticationException("Nemáte nastavené heslo. Můžete se přihlásit přes " . implode(', ', $services) . ".", self::INVALID_CREDENTIAL);
		}

		$hash = (new \Password())->calculateHash($password, $user->salt);
		if ($user->password !== $hash) {
			throw new NS\AuthenticationException("Nesprávné heslo.", self::INVALID_CREDENTIAL);
		}

		return new NS\Identity($user->id, explode(';', $user->role), []);
	}

}
