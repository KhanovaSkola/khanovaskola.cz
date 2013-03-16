<?php

namespace ModeratorModule;

use Model\NetteUser as ROLE;


abstract class BaseModeratorPresenter extends \BasePresenter
{

	public function startup()
	{
		if (!$this->user->isInrole(ROLE::EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException();
		}

		parent::startup();
	}

}
