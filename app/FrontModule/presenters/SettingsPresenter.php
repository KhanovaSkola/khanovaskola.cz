<?php

namespace FrontModule;

use \Nette\Application\UI\Form;


class SettingsPresenter extends BaseFrontPresenter
{

	public function startup()
	{
		if (!$this->user->loggedIn) {
			$this->flashMessage('Přihlašte se prosím.');
			$this->redirect(':Front:Sign:in');
		}

		parent::startup();
	}



	public function renderConfirmCoach($coach_id)
	{
		if ($this->user->id == $coach_id) {
			$this->flashMessage('Tento odkaz slouží vašim studentům k tomu, aby si vás přidali jako učitele.');
			$this->redirect(':Front:Settings:');
		}

		$this->template->coach = $this->context->users->find($coach_id);
	}



	public function handleConfirmCoach($coach_id)
	{
		if ($this->user->id == $coach_id) {
			$this->flashMessage('Tento odkaz slouží vašim studentům k tomu, aby si vás přidali jako učitele.');
			$this->redirect(':Front:Settings:');
		}

		$this->user->entity->addCoach($this->context->users->find($coach_id));
		$this->flashMessage('Přidali jste si učitele. Nyní uvidí, jaké lekce a cvičení máte už splněné.');
		$this->redirect(':Front:Settings:');
	}



	public function createComponentAddTeacherForm($name)
	{
		$form = new Form($this, $name);

		$form->addText('email')
			->addRule(Form::EMAIL, 'Vyplňte prosím email učitele, kterého chcete přidat')
			->setRequired('Vyplňte prosím email učitele, kterého chcete přidat');

		$form->addSubmit('send');
		$form->onSuccess[] = callback($this, 'onSuccessAddTeacherForm');

		return $form;
	}



	public function onSuccessAddTeacherForm(Form $form)
	{
		$email = $form->values->email;
		$coach = $this->context->users->findOneBy(['mail' => $email]);

		if (!$coach) {
			$form->addError('Takový učitel neexistuje. Zkontrolujte prosím, že jste správně vyplnili emailovou adresu učitele.');
			return FALSE;
		} else if ($coach->id == $this->user->id) {
			$form->addError('Vyplňte prosím email učitele, kterého chcete přidat, nikoliv svůj.');
			return FALSE;
		}

		if ($this->user->entity->addCoach($coach)) {
			$this->flashMessage('Přidali jste si nového učitele. Nyní uvidí váš postup jak v lekcích, tak ve cvičeních.');
		}

		$this->redirect(':Front:Settings:');
	}



	public function handleRemoveCoach($coach_id)
	{
		$coach = $this->context->users->find($coach_id);
		$this->user->entity->removeCoach($coach);

		$this->flashMessage('Přestali jste být žák tohoto učitele na Khanově škole.');
		$this->redirect('this');
	}

}
