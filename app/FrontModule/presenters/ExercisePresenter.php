<?php

namespace FrontModule;

class ExercisePresenter extends BaseFrontPresenter
{

	public function renderDefault($file)
	{
		$this->template->file = $file;
	}

}
