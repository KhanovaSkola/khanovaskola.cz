<?php

namespace ModeratorModule;


abstract class BaseModeratorPresenter extends \BasePresenter
{

	public function startup()
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException();
		}

		parent::startup();
	}

}
