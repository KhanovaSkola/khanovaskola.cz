<?php

class Youtube extends BaseControl
{

	public function render(Video $video, $autoplay = FALSE)
	{
		$this->template->setFile(__DIR__ . '/template.latte');
		$this->template->video = $video;
		$this->template->autoplay = $autoplay;
		$this->template->render();
	}



	public function renderTablet(Video $video, $autoplay = FALSE)
	{
		$this->template->setFile(__DIR__ . '/tablet.latte');
		$this->template->video = $video;
		$this->template->autoplay = $autoplay;
		$this->template->render();
	}

}
