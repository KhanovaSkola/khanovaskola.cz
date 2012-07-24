<?php

namespace FrontModule;



class HomepagePresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->categories = $this->context->categories->findRoot();
		$this->template->featured_video = $this->context->videos->findAll()->order('Rand()')->limit(1)->fetch();
	}

}
