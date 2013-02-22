<?php

namespace LogModule;


abstract class BaseLogPresenter extends \BasePresenter
{

	public function startup()
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_ADMIN)) {
			throw new \Nette\Application\ForbiddenRequestException();
		}

		parent::startup();
	}

}
