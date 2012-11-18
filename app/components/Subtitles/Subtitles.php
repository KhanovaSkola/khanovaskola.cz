<?php

class Subtitles extends BaseControl
{

	protected $params;



	public function render(Video $video)
	{
		$this->getSubtitles($video);
		$this->template->setFile(__DIR__ . '/template.latte');
		$this->template->subtitles = $this->getSubtitles($video);
		$this->template->render();
	}



	private function getSubtitles(Video $video)
	{
		$par = $this->presenter->context->params['amara'];
		$amara = new \Amara($par['key'], $par['username'], $this->presenter->context->cacheStorage);
		return $amara->getSubtitles($video);
	}

}
