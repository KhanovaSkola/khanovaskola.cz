<?php

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
		\Helpers::register($this->template);
	}

}
