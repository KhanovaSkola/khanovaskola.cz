<?php

class NetteUser extends \Nette\Security\User
{

	/** @var Nette\DI\Container */
 	protected $context;



	public function __construct(\Nette\Security\IUserStorage $storage, \Nette\DI\Container $context)
	{
		parent::__construct($storage, $context);
		$this->context = $context;
	}



	/**
	 * @return User
	 */
	public function getEntity()
	{
		return $this->context->users->findOneBy(['id' => $this->id]);
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

}
