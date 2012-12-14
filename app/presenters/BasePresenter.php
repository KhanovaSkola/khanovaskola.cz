<?php

/**
 * @property NetteUser $user
 * @property bool $moderator
 * @property bool $admin
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

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
		if ($this->context->parameters['environment'] == 'production') {
			$this->template->cdnUrl = 'http://khancdn.eu';
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
		$form = $this->createForm($name);

		$control = $form->addText('query')->getControlPrototype();
		$control->attrs['type'] = 'search';
		$control->attrs['results'] = '5';
		$control->attrs['autosave'] = 'khanovaskola_search';

		$form->addSubmit('send');
	}



	public function onSuccessSearch($form)
	{
		$q = $form['query']->getValue();
		if (!$q) {
			$this->redirect('this');
		}

		$this->redirect(':Front:Search:', ['q' => $q]);
	}



	/**
	 * @see https://gist.github.com/1002597
	 */
	public function isMobile()
	{
		$agent = $this->getHttpRequest()->getHeader("user-agent");
		$devices = [
			"android" => "android",
			"blackberry" => "blackberry",
			"iphone" => "(iphone|ipod)",
			"ipad" => "ipad",
			"opera" => "opera mini",
			"palm" => "(avantgo|blazer|elaine|hiptop|palm|plucker|xiino)",
			"windows" => "windows ce; (iemobile|ppc|smartphone)",
			"generic" => "(kindle|mobile|mmp|midp|o2|pda|pocket|psp|symbian|smartphone|treo|up.browser|up.link|vodafone|wap)"
		];

		foreach ($devices as $device => $pattern) {
			if (\Nette\Utils\Strings::match($agent, "~$pattern~i")) {
				return $device;
			}
		}

		return FALSE;
	}



	protected function createForm($name)
	{
		$form = new \Nette\Application\UI\Form($this, $name);

		$form->onSuccess[] = callback($this, 'onSuccess' . ucFirst($name));

		return $form;
	}



	public function createComponentSubtitles()
	{
		return new Subtitles();
	}



	public function getBacklink()
	{
		return $this->link('this');
	}
}
