<?php

use Nette\Application\UI;
use Nette\Security as NS;
use Nette\Caching\Cache;


class SignPresenter extends BasePresenter
{

    /** @persistent */
    public $backlink;



    public function actionInFacebook()
    {
        $url = $this->context->facebook->getLoginUrl([
            'scope' => ['email'],
            'redirect_uri' => $this->link("//fbAuth"),
        ]);
        $this->redirectUrl($url);
    }



    public function actionInGoogle()
    {
        $url = $this->context->google->getLoginUrl([
            'scope' => $this->context->parameters['google']['scope'],
            'redirect_uri' => $this->link('//googleAuth'),
        ]);
        $this->redirectUrl($url);
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

		$form->addSubmit('send', 'Přihlásit');

		$form->onSuccess[] = $this->signInFormSubmitted;
		return $form;
	}



	public function signInFormSubmitted($form)
	{
		try {
			$values = $form->getValues();

			$this->user->setExpiration('+ 7 days', TRUE);
			$this->user->login($values->username, $values->password);

            $this->inRedirect();

		} catch (NS\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}



	public function actionOut()
	{
		$withFb = $this->user->isLoggedInWithFacebook();

		$this->user->logout();
		if ($withFb) {
			$url = $this->context->facebook->getLogoutUrl([
				/**
				 * Facebook does not redirect to it without the final slash
				 * @see http://stackoverflow.com/a/8363709/326257
				 */
				'next' => $this->presenter->link('//:Sign:in') . '/',
			]);
			$this->redirectUrl($url);
		}

		$this->flashMessage('Byli jste odhlášeni.');
		$this->redirect('in');
	}



	public function actionFbAuth()
	{
		$info = $this->context->facebook->api('/me');
		if ($info) {
			$this->user->facebookLogin($info);
		}

        $this->inRedirect();
	}



	public function actionGoogleAuth($code, $error = NULL)
	{
		if ($error) {
			$this->flashMessage('Povolte prosím Khanově škole přístup, bez toho se nebudete moct přes váš Google účet přihlásit.');
			$this->redirect('in');
		}

		$g = $this->context->google;
		$token = $g->getToken($code, $this->link('//googleAuth'));

		$this->user->googleLogin($g->getInfo($token));

        $this->inRedirect();
	}



    protected function inRedirect()
    {
        if (!$this->backlink || $this->backlink === '/') {
            if ($this->user->isInRole('moderator')) {
                $this->redirect(':Moderator:Dashboard:');
            } else {
                $this->redirect(':Front:Homepage:');
            }
        }
        $this->redirectUrl($this->backlink);
    }

}
