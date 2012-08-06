<?php

namespace ModeratorModule;


abstract class BaseModeratorPresenter extends \BasePresenter
{

	public function startup()
	{
		parent::startup();

		if (!$this->user->isInRole('moderator')) {
			/** @todo or throw error 503? */
			$this->redirect(':Front:Homepage:');
		}
	}

}
