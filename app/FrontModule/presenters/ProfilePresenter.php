<?php

namespace FrontModule;


class ProfilePresenter extends BaseFrontPresenter
{

	/** @persistent */
	public $pid;

	/** @var User */
	public $profile;



	public function startup()
	{
		parent::startup();

		if ($this->pid) {
			$this->profile = $this->context->users->find($this->pid);

		} elseif ($this->user->loggedIn) {
			$this->profile = $this->user->entity;

		} else {
			$this->flashMessage('Přihlaste se prosím.');
			$this->redirect(':Sign:in:');
		}
	}



	public function renderDefault()
	{
		$this->template->profile = $this->profile;
	}

}
