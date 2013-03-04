<?php

namespace LogModule;

use \Model\NetteUser as ROLE;


abstract class BaseLogPresenter extends \BasePresenter
{

	public function startup()
	{
		if (!$this->user->isInrole(ROLE::ADMIN)) {
			throw new \Nette\Application\ForbiddenRequestException();
		}

		parent::startup();
	}

}
