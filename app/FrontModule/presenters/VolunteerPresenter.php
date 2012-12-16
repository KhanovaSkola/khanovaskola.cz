<?php

namespace FrontModule;


class VolunteerPresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->volunteers = $this->context->volunteers->findAll()->order('name ASC');

		$dubbed = $this->context->videos->findAllDubbed()->count();
		$translated = $this->context->videos->findAll()->count();
		$this->template->count = (object) [
			'Zbývá' => 3600 - $translated,
			'Přeložené' => $translated - $dubbed,
			'Dabované' => $dubbed,
		];
	}

}
