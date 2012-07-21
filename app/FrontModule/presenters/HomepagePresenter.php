<?php

namespace FrontModule;



class HomepagePresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->categories = $this->context->categories->findRoot();
	}

}
