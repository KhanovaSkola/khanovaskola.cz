<?php

namespace FrontModule;

use Nette\Security\IUserStorage as Reason;


abstract class AuthenticatedPresenter extends \BasePresenter
{

	public function startup()
	{
		if (!$this->user->loggedIn) {
			switch ($this->user->getLogoutReason()) {
				case Reason::MANUAL:
					$this->flashMessage('Odhlásili jste se. Pokuď se chcete vrátit na tento obsah, znovu se prosím přihlašte.');
					break;
				case Reason::INACTIVITY:
					$this->flashMessage('Byli jste odhlášeni, protože jste delší dobu aplikaci nepoužívali. Znovu se prosím přihlašte.');
					break;
				case Reason::BROWSER_CLOSED:
				case Reason::CLEAR_IDENTITY:
				default:
					$this->flashMessage('Přihlašte se prosím.');
					break;
			}
			$this->redirect(':Sign:in');
		}

		parent::startup();
	}

}
