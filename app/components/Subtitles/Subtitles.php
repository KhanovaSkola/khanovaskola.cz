<?php

namespace Control;


class Subtitles extends BaseControl
{

	protected $params;



	public function render($subtitles)
	{
		$this->template->setFile(__DIR__ . '/template.latte');
		$this->template->subtitles = $subtitles;
		$this->template->render();
	}



	protected function createTemplate($class = NULL)
	{
		$template = parent::createTemplate($class);
		$template->registerHelper('time', function ($sec) {
			$minutes = floor($sec / 60);
			$seconds = floor($sec % 60);
			return str_pad($minutes, 2, '0', \STR_PAD_LEFT) . ':' . str_pad($seconds, 2, '0', \STR_PAD_LEFT);
		});
		return $template;
	}

}
