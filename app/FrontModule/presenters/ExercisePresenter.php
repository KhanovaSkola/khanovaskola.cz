<?php

namespace FrontModule;



class ExercisePresenter extends BaseFrontPresenter
{

	public function renderDefault($file)
	{
		$content = file_get_contents(APP_DIR . "/../exercise/exercises/$file.html");
		$this->template->content = $content;
	}

}
