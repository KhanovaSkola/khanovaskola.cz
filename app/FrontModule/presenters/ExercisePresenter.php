<?php

namespace FrontModule;

class ExercisePresenter extends BaseFrontPresenter
{

	public function renderDefault($id)
	{
		if (!$id || !preg_match('~^[a-z0-9_.]+$~ims', $id)) {
			$this->redirect('list');
		}
		$this->template->file = $id;
	}
	
	
	
	public function renderList()
	{
		$exercises = [];
		
		foreach (scandir(WWW_DIR . '/exercise/translated') as $file) {
			if (in_array($file, ['.', '..', 'khan-site.html', 'khan-excercise.html'])) {
				continue;
			}
			$exercises[] = substr($file, 0, -5);
		}
		
		$this->template->exercises = $exercises;
	}

}
