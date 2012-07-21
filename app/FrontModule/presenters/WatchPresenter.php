<?php

namespace FrontModule;

class WatchPresenter extends BaseFrontPresenter
{

	public function renderDefault($id)
	{
		$video = $this->context->videos->findOneBy(['id' => $id]);
		$this->template->video = $video;
	}

}
