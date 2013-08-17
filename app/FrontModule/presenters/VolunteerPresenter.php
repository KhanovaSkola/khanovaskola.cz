<?php

namespace FrontModule;

use \Nette\Caching\Cache;


class VolunteerPresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->eng_videos = 4560;

		$this->template->volunteers = $this->context->volunteers->findAll()->order('name ASC');
		$this->template->wanted_cats =$this->context->categories->findByVotes();
	}

}
