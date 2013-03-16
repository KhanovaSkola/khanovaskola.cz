<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Utils\Html;


class RegistrationPresenter extends BaseFrontPresenter
{

	public function actionWelcome()
	{
		if (!$this->user->loggedIn) {
			$this->redirect(':Front:Homepage:');
		}

		$sesion = $this->context->session->getSection('registration');
		if (!$sesion->showWelcome) {
			$this->redirect(':Front:Profile:');
		} else {
			$sesion->showWelcome = FALSE;
		}
	}



	public function actionDefault()
	{
		if ($this->user->loggedIn) {
			$this->flashMessage('Již jste zaregistrovaní, nepotřebujete se registrovat znovu.');
			$this->redirect(':Front:Homepage:');
		}
	}



	public function createComponentRegistrationForm($name)
	{
		$form = $this->createForm($name);

		$control = $form->addText('name')
			->setRequired('Vyplńte prosím vaše jméno')
			->getControlPrototype();
		$control->attrs['autofocus'] = TRUE;

		$control = $form->addText('mail')
			->addRule(Form::EMAIL, 'Zkontrolujte vaší emailovou adresu.')
			->setRequired('Vyplňte prosím emailovou adresu.')
			->getControlPrototype();
		$control->attrs['type'] = 'email';

		$form->addPassword('password', 'Heslo')
			->setRequired('Vyplňte vaše heslo.');

		$form->addSubmit('send');
		return $form;
	}



	public function onSuccessRegistrationForm(Form $form)
	{
		$v = $form->values;

		$p = new \Model\Password();
		$salt = $p->getRandomSalt();
		$hash = $p->calculateHash($v->password, $salt);

		try {
			$this->context->users->insert([
				'name' => $v->name,
				'mail' => $v->mail,
				'password' => $hash,
				'salt' => $salt,
				'registration' => time(),
				'role' => '',
			]);

		} catch (\PDOException $e) {
			if ($e->getCode() != 23000) {
				throw $e;
			}

			$error = Html::el('div');
			$error->add(Html::el('span')->setText('Tento email už je u nějakého účtu zaregistrovaný. Nechcete se radši'));
			$error->add(Html::el('a')->href($this->link(':Sign:in', ['mail' => $v->mail]))->setText('přihlásit'));
			$error->add(Html::el('span')->setText('?'));
			$form->addError($error);
			return FALSE;
		}

		$this->user->login($v->mail, $v->password);

		$sesion = $this->context->session->getSection('registration');
		$sesion->showWelcome = TRUE;
		$this->redirect('welcome');
	}

}
