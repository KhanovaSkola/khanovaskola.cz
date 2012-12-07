<?php

namespace FrontModule;


class VolunteerPresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->volunteers = $this->context->volunteers->findAll()->order('name ASC');
	}

}
