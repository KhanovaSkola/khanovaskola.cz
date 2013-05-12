<?php

namespace FrontModule;


class HrPresenter extends BaseFrontPresenter
{

	public function renderDefault($name)
	{
		$this->setView($name);
	}

}
