<?php

namespace FrontModule;


abstract class AuthenticatedPresenter extends \BasePresenter
{

	public function startup()
	{
		if (!$this->user->loggedIn) {
			/** @todo copywrite, add logout reason */
			$this->flashMessage('Přihlašte se prosím.');
			$this->redirect(':Sign:in');
		}

		parent::startup();
	}

}
