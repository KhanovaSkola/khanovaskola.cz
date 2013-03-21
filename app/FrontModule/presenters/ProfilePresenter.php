<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;


class ProfilePresenter extends BaseFrontPresenter
{

	/** @persistent */
	public $pid;

	/** @var \User */
	public $profile;



	public function startup()
	{
		parent::startup();

		if ($this->pid) {
			$this->profile = $this->context->users->find($this->pid);
			if (!$this->profile) {
				throw new \Nette\Application\BadRequestException;
			}

		} elseif ($this->user->loggedIn) {
			$this->profile = $this->user->entity;

		} else {
			$this->redirect(':Sign:in', ['backlink' => $this->link('this')]);
		}

		if (!$this->user->entity->canView($this->profile)) {
			throw new \Nette\Application\ForbiddenRequestException();

		} else if ($this->user->id !== $this->profile->id) {
			$this->redirect(':Coach:Profile:', ['pid' => $this->profile->id]);
		}
	}



	public function renderDefault()
	{
		$this->template->profile = $this->profile;
	}



	public function renderConfirmCoach($coach_id, $hash)
	{
		$coach = $this->context->users->find($coach_id);
		if ($hash !== $coach->getSecretHash()) {
			throw new \Nette\Application\BadRequestException;
		
		} else if ($this->user->id == $coach_id) {
			$this->flashMessage('Tento odkaz slouží vašim studentům k tomu, aby si vás přidali jako učitele.');
			$this->redirect('default');

		} else if ($this->user->entity->isCoachedBy($coach_id)) {
			$this->flashMessage('Tohoto učitele už máte zaregistrovaného.');
			$this->redirect('default');
		}

		$this->template->coach = $coach;
	}



	public function handleConfirmCoach($coach_id)
	{
		if ($this->user->id == $coach_id) {
			$this->flashMessage('Tento odkaz slouží vašim studentům k tomu, aby si vás přidali jako učitele.');
			$this->redirect(':Front:Settings:');
		}

		$this->user->entity->addCoach($this->context->users->find($coach_id));

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => ["coach/groups/{$coach_id}"]]);

		$this->flashMessage('Přidali jste si učitele. Nyní uvidí, jaké lekce a cvičení máte už splněné.');
		$this->redirect('default');
	}



	public function createComponentAddTeacherForm($name)
	{
		$form = $this->createForm($name);

		$form->addText('email', 'Email učitele')
			->addRule(Form::EMAIL, 'Vyplňte prosím email učitele, kterého chcete přidat')
			->setRequired('Vyplňte prosím email učitele, kterého chcete přidat');

		$form->addSubmit('send', 'Přidat učitele')->getControlPrototype()->class = "simple-button green";
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

		$this->redirect('default');
	}



	public function handleRemoveCoach($coach_id)
	{
		$coach = $this->context->users->find($coach_id);
		$this->user->entity->removeCoach($coach);

		$this->flashMessage('Přestali jste být žák tohoto učitele na Khanově škole.');
		$this->redirect('this');
	}

}
