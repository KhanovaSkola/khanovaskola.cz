<?php

namespace FrontModule;


class ProfilePresenter extends BaseFrontPresenter
{

	public function startup()
	{
		if (!$this->user->loggedIn) {
			$this->flashMessage('Přihlašte se prosím.');
			$this->redirect(':Front:Sign:in');
		}

		parent::startup();
	}



	public function renderDefault()
	{
		$this->template->profile = FALSE ?: $this->user->entity;
	}

}
