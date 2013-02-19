<?php

use Mikulas\Git;


/**
 * @property NetteUser $user
 * @property bool $moderator
 * @property bool $admin
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

	const CSRF_OFF = FALSE;



	/**
	 * @return string
	 */
	public function getUrl()
	{
		return (string) $this->getHttpRequest()->getUrl();
	}



	protected function createTemplate($class = NULL)
	{
		$template = parent::createTemplate($class);

		$template->registerHelper('time', function ($s) {
			$hours = (int) ($s / 3600);
			$minutes = round(($s - $hours * 3600) / 60);
			return "{$hours}h {$minutes}m";
		});

		return $template;
	}



	public function beforeRender()
	{
		if (isset($this->context->parameters['cdn'])) {
			$this->template->cdnUrl = $this->context->parameters['cdn'];
		} else {
			$this->template->cdnUrl = $this->template->baseUrl;
		}

		$this->template->git_deploy = (object) [
			'branch' => Git::getBranch(),
			'commit' => Git::getCommit(),
			'hash' => substr(Git::getCommit(), 0, 7),
		];

		\Helpers::register($this->template);
		$this['search']['query']->setValue($this->getParameter('q'));

		if ($this->user->loggedIn) {
			$session = $this->getSession('dynamic_css');
			$this->template->dynamic_css_hash = $session->hash;
		}
	}



	public function createComponentSearch($name)
	{
		$form = $this->createForm($name, self::CSRF_OFF);

		$control = $form->addText('query')->getControlPrototype();
		$control->attrs['type'] = 'search';
		$control->attrs['results'] = '5';
		$control->attrs['autosave'] = 'khanovaskola_search';

		$form->addSubmit('send');
		return $form;
	}



	public function onSuccessSearch($form)
	{
		$q = $form['query']->getValue();
		if (!$q) {
			$this->redirect('this');
		}

		$this->redirect(':Front:Search:', ['q' => $q]);
	}



	protected function createForm($name, $protect = NULL)
	{
		$form = new \Nette\Application\UI\Form();

		if ($protect !== self::CSRF_OFF) {
			$form->addProtection('Odešlete prosím formulář znovu, vypršel bezpečnostní limit.');
		}

		$form->onSuccess[] = callback($this, 'onSuccess' . ucFirst($name));

		return $form;
	}



	public function createComponentSubtitles()
	{
		return new Subtitles();
	}



	public function createComponentGithub()
	{
		return new \Control\Github();
	}



	public function getBacklink()
	{
		return $this->link('this');
	}
}
