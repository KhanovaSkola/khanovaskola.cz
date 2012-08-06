<?php

class Password
{

	public function getRandomSalt()
	{
		return \Nette\Utils\Strings::random(8);
	}



	/**
	 * Computes salted password hash
	 * @param string
	 * @param string
	 * @return string
	 */
	public function calculateHash($password, $salt, $depth = 100)
	{
		if ($depth === 0) {
			return md5("$salt.$password.$salt");
		}

		return md5($this->calculateHash($password, $salt, $depth - 1));
	}
}
