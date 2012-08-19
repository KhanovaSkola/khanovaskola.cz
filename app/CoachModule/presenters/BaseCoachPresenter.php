<?php

namespace CoachModule;


abstract class BaseCoachPresenter extends \BasePresenter
{

	public function startup()
	{
		if (!$this->user->loggedIn) {
			$this->redirect(':Front:About:coach');
		}

		parent::startup();
	}

}
