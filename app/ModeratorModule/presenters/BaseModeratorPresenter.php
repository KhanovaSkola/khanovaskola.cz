<?php

namespace ModeratorModule;


abstract class BaseModeratorPresenter extends \BasePresenter
{

	public function startup()
	{
		if (!$this->user->moderator) {
            throw new \Nette\Application\ForbiddenRequestException();
		}

		parent::startup();
	}

}
