<?php

use Nette\Application\UI,
	Nette\Security as NS;


class SignPresenter extends BasePresenter
{


	/**
	 * Sign in form component factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
		$form = new UI\Form;
		$form->addText('username')
			->setRequired('Please provide a username.');

		$form->addPassword('password')
			->setRequired('Please provide a password.');

		$form->addCheckbox('remember');

		$form->addSubmit('send', 'Sign in');

		$form->onSuccess[] = $this->signInFormSubmitted;
		return $form;
	}



	public function signInFormSubmitted($form)
	{
		try {
			$values = $form->getValues();
			if ($values->remember) {
				$this->user->setExpiration('+ 14 days', FALSE);
			} else {
				$this->user->setExpiration('+ 20 minutes', TRUE);
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
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}

}
