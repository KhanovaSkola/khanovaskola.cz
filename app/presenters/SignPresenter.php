<?php

use Nette\Application\UI;
use Nette\Security as NS;
use Nette\Caching\Cache;


class SignPresenter extends BasePresenter
{

	public function renderIn()
	{
		$this->template->loginUrl = $this->context->facebook->getLoginUrl([
			'scope' => ['email'],
			'redirect_uri' => $this->link("//fbAuth"),
		]);
	}



	/**
	 * Sign in form component factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new UI\Form;
		$control = $form->addText('username')
			->setRequired('Vyplňte mail.')
			->getControlPrototype();
		$control->attrs['type'] = 'email';
		$control->attrs['autofocus'] = TRUE;

		$form->addPassword('password')
			->setRequired('Vyplňte heslo.');

		$form->addCheckbox('remember');

		$form->addSubmit('send', 'Přihlásit');

		$form->onSuccess[] = $this->signInFormSubmitted;
		return $form;
	}



	public function signInFormSubmitted($form)
	{
		try {
			$values = $form->getValues();
			/** @todo meddle with */
			if ($values->remember) {
				$this->user->setExpiration('+ 14 days', FALSE);
			} else {
				$this->user->setExpiration('+ 7 days', TRUE);
			}
			$this->user->login($values->username, $values->password);

			if ($this->user->isInRole('moderator')) {
				$this->redirect(':Moderator:Dashboard:');
			} else {
				$this->redirect(':Front:Homepage:');
			}

		} catch (NS\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}



	public function actionOut()
	{
		$this->getUser()->logout();

		$this->flashMessage('Byli jste odhlášeni.');
		$this->redirect('in');
	}



	public function actionFbAuth()
	{
		$info = $this->context->facebook->api('/me');
		if ($info) {
			$this->user->login($info);
		}

		$this->redirect(':Front:Profile:');
	}

}
