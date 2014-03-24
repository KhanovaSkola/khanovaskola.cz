<?php

use Nette\Application\UI;
use Nette\Security as NS;
use Nette\Caching\Cache;
use Model\NetteUser as ROLE;


class SignPresenter extends BasePresenter
{

	const DISCOURSE_SSO = 'discourse-sso-redirect';
	const WIKI_SSO = 'wiki-sso-redirect';

	/** @persistent */
	public $backlink;

	/** @persistent */
	public $request;



	public function actionIn()
	{
		if ($this->user->isLoggedIn()) {
			$this->redirect(':Front:Profile:');
		}
	}



	public function renderIn($mail = NULL)
	{
		$this['signInForm']['username']->setDefaultValue($mail);
	}



	public function actionSso($sso, $sig)
	{
		$discourse = $this->context->discourse;
		if ($discourse->getSignature($sso) !== $sig)
		{
			$this->error();
		}

		if ($this->user->loggedIn)
		{
			$url = $discourse->getLoginUrl($sso, $this->user->entity);
			$this->redirectUrl($url);
		}

		$session = $this->context->session->getSection('discourse');
		$session->sso = $sso;
		$session->setExpiration('8 minutes'); // discourse expires after 10
		$this->redirect('in', ['backlink' => self::DISCOURSE_SSO]);
	}

	public function actionSsoWiki($sso, $sig)
	{
		$wiki = $this->context->wiki;
		if ($wiki->getSignature($sso) !== $sig)
		{
			$this->error();
		}

		if ($this->user->loggedIn)
		{
			$url = $wiki->getLoginUrl($sso, $this->user->entity);
			$this->redirectUrl($url);
		}

		$session = $this->context->session->getSection('wiki');
		$session->sso = $sso;
		$session->setExpiration('8 minutes');
		$this->redirect('in', ['backlink' => self::WIKI_SSO]);
	}



	public function actionForgotten()
	{
		if ($this->user->isLoggedIn()) {
			$this->redirect(':Front:Profile:');
		}
	}



	public function getBacklink()
	{
		return NULL;
	}



	public function actionInFacebook()
	{
		if ($this->user->isLoggedIn()) {
			$this->redirect(':Front:Profile:');
		}

		$url = $this->context->facebook->getLoginUrl([
			'scope' => ['email'],
			'redirect_uri' => $this->link("//fbAuth"),
		]);
		$this->redirectUrl($url);
	}



	public function actionInGoogle()
	{
		if ($this->user->isLoggedIn()) {
			$this->redirect(':Front:Profile:');
		}

		$url = $this->context->google->getLoginUrl([
			'scope' => $this->context->parameters['google']['scope'],
			'redirect_uri' => $this->link('//googleAuth', ['backlink' => NULL]), // backlink must be passed with state
			'state' => $this->backlink
		]);
		$this->redirectUrl($url);
	}



	/**
	 * Sign in form component factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm($name)
	{
		$form = $this->createForm($name);
		$control = $form->addText('username')
			->setRequired('Vyplňte mail.')
			->addRule($form::EMAIL, 'Zkontrolujte formát emailu.')
			->getControlPrototype();
		$control->attrs['type'] = 'email';
		$control->attrs['autofocus'] = TRUE;

		$form->addPassword('password')
			->setRequired('Vyplňte heslo.');

		$form->addSubmit('send', 'Přihlásit');
		return $form;
	}



	public function onSuccessSignInForm($form)
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



	public function actionRemoteAuth($mail, $password)
	{
		if (!$mail || !$password)
		{
			$this->sendJson(['status' => 'failure']);
		}
		if ($this->user->loggedIn && $this->user->entity->mail === $mail)
		{
			$this->sendSuccess($this->user->entity);
		}

		$user = $this->users->findOneBy(['mail' => $mail]);
		if (!$user)
		{
			$this->sendJson(['status' => 'failure']);
		}
		$hash = (new \Model\Password())->calculateHash($password, $user->salt);
		if ($user->password === $hash) {
			$this->sendSuccess($user);
		}
		$this->sendJson(['status' => 'failure']);
	}

	private function sendSuccess($user)
	{
		$this->sendJson([
			'status' => 'success',
			'grps' => explode(';', $user->roles),
			'name' => $user->name,
			'mail' => $user->mail,
			'uid' => $user->id,
		]);
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



	public function actionFbAuth($error)
	{
		if ($error === "access_denied") {
			$this->flashMessage('Povolte prosím přístup Khanově škole na váš Facebook účet. Ukládáme pouze vaše jméno a email.');
			$this->redirect('in');
		}
		$info = $this->context->facebook->api('/me');
		if ($info) {
			$this->user->facebookLogin($info);
			$this->user->setExpiration('+ 7 days', TRUE);
		}

		$this->inRedirect();
	}



	public function actionGoogleAuth($code, $state, $error = NULL)
	{
		if ($error) {
			$this->flashMessage('Povolte prosím Khanově škole přístup, bez toho se nebudete moct přes váš Google účet přihlásit.');
			$this->redirect('in');
		}

		$g = $this->context->google;
		try {
			$token = $g->getToken($code, $this->link('//googleAuth'));

		} catch (\Model\GoogleException $e) {
			$this->flashMessage('Při přihlášení nastala prazvláštní chyba, zkuste se prosím přihlásit znovu.');
			$this->redirect('in');
		}

		$this->user->googleLogin($g->getInfo($token));
		$this->user->setExpiration('+ 7 days', TRUE);

		$this->backlink = $state;
		$this->inRedirect();
	}



	protected function inRedirect()
	{
		$discourse = $this->context->session->getSection('discourse');
		if ($payload = $discourse->sso)
		{
			unset($discourse->sso);
			$url = $this->context->discourse->getLoginUrl($payload, $this->user->entity);
			$this->redirectUrl($url);
		}

		$wiki = $this->context->session->getSection('wiki');
		if ($payload = $wiki->sso)
		{
			unset($wiki->sso);
			$url = $this->context->wiki->getLoginUrl($payload, $this->user->entity);
			$this->redirectUrl($url);
		}

		if ($this->user->isInRole('new-user')) {
			$sesion = $this->context->session->getSection('registration');
			$sesion->showWelcome = TRUE;
			$this->redirect(':Front:Registration:welcome');
		}

		if ($this->request)
		{
			return $this->restoreRequest($this->request);
		}

		if (!$this->backlink) {
			if ($this->user->isInrole(ROLE::EDITOR)) {
				$this->redirect(':Moderator:Dashboard:');
			} else {
				$this->redirect(':Front:Homepage:');
			}
		}

		$this->redirectUrl($this->backlink);
	}



	/**
	 * Sign in form component factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentPassResetForm($name)
	{
		$form = $this->createForm($name);
		$control = $form->addText('username')
			->setRequired('Vyplňte mail.')
			->addRule($form::EMAIL, 'Zkontrolujte formát emailu.')
			->getControlPrototype();
		$control->attrs['type'] = 'email';
		$control->attrs['autofocus'] = TRUE;

		$form->addSubmit('send', 'Pokračovat');
		return $form;
	}



	public function onSuccessPassResetForm($form)
	{
		$email = $form['username']->value;
		$user = $this->context->users->findOneBy(['mail' => $email]);
		if (!$user) {
			$form->addError('Pod tímto emailem není žádný uživatel zaregistrovaný.');
			return FALSE;
		}

		$email = new \Model\Email($user);
		$email->sendPasswordReset($link = $this->link('//:Sign:reset', [
			'id' => $user->id,
			'code' => $user->getSecurityCode(),
		]));
		$this->flashMessage('Zaslali jsme vám do vaší schránky email s dalším postupem.');
		$this->redirect('in');
	}



	public function actionReset($id, $code)
	{
		$user = $this->context->users->find($id);
		$this->checkCode($user, $code);

		$this->template->mail = $user->mail;
		$this['passSetForm']['user_id']->setValue($user->id);
		$this['passSetForm']['code']->setValue($code);
	}



	private function checkCode($user, $code)
	{
		list($time, $hash) = explode(':', $code);

		if ((int) $time < time() - 60 * 120) { // expires after two hours
			$this->flashMessage('Tento kód už vypršel, pošlete si prosím nový.');
			$this->redirect('forgotten');
		}

		if ($user->getSecurityCode($time) != $code) {
			$this->flashMessage('Špatný bezpečnostní kód, pošlete si prosím nový.');
			$this->redirect('forgotten');
		}
	}



	/**
	 * Sign in form component factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentPassSetForm($name)
	{
		$form = $this->createForm($name);

		$control = $form->addPassword('password')
			->setRequired('Vyplňte heslo.')
			->getControlPrototype();
		$control->attrs['autofocus'] = TRUE;

		$form->addPassword('check')
			->addRule($form::EQUAL, 'Hesla musí být stejná.', $form['password']);

		$form->addHidden('user_id');
		$form->addHidden('code');

		$form->addSubmit('send', 'Změnit heslo');
		return $form;
	}



	public function onSuccessPassSetForm($form)
	{
		$v = $form->values;

		$user = $this->context->users->find($v['user_id']);
		$this->checkCode($user, $v['code']);

		$p = new \Model\Password();
		$salt = $p->getRandomSalt();
		$hash = $p->calculateHash($v->password, $salt);

		$user->salt = $salt;
		$user->password = $hash;
		$user->update();

		$this->flashMessage('Heslo bylo úspěšně změněno.');
		$this->user->login($user->mail, $v->password);
		$this->inRedirect();
	}

}
