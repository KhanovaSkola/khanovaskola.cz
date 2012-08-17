<?php

namespace FrontModule;

use Nette\Application\UI\Form;


class RegistrationPresenter extends BaseFrontPresenter
{

	public function startup()
	{
		parent::startup();

		if ($this->user->loggedIn) {
			$this->flashMessage('Již jste zaregistrovaní, nepotřebujete se registrovat znovu.');
			$this->redirect(':Front:Homepage:');
		}
	}



	public function createComponentRegistrationForm($name)
	{
		$form = new Form($this, $name);

		$form->addText('name'); // intentionally not required
		$form->addText('mail')
			->addRule(Form::EMAIL, 'Zkontrolujte vaší emailovou adresu.')
			->setRequired('Vyplňte prosím emailovou adresu.');
		$form->addPassword('password', 'Heslo')
			->setRequired('Vyplňte vaše heslo.');

		$form->addSubmit('send');
		$form->onSuccess[] = callback($this, 'onSuccessRegistrationForm');

		return $form;
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
