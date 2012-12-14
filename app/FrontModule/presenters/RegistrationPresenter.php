<?php

namespace FrontModule;

use Nette\Application\UI\Form;


class RegistrationPresenter extends BaseFrontPresenter
{

	public function startup()
	{
		if ($this->user->loggedIn) {
			$this->flashMessage('Již jste zaregistrovaní, nepotřebujete se registrovat znovu.');
			$this->redirect(':Front:Homepage:');
		}

		parent::startup();
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
	}



	public function onSuccessRegistrationForm(Form $form)
	{
		$v = $form->values;

		$p = new \Password();
		$salt = $p->getRandomSalt();
		$hash = $p->calculateHash($v->password, $salt);

		$this->context->users->insert([
			'name' => $v->name,
			'mail' => $v->mail,
			'password' => $hash,
			'salt' => $salt,
			'role' => '',
		]);

		$this->user->login($v->mail, $v->password);

		$this->flashMessage('Vítejte, nyní jste člen Khanovy školy. Uvidíte, které lekce jste už prošli.');
		$this->redirect(':Front:Homepage:');
	}

}
