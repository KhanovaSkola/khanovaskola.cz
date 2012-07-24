<?php

namespace FrontModule;

class ExercisePresenter extends BaseFrontPresenter
{

	public function renderDefault($eid)
	{
		$exercise = $this->context->exercises->findOneBy(['id' => $eid]);
		if (!$exercise) {
			$this->redirect('list');
		}
		
		$this->template->file = $exercise->file;
	}
	
	
	
	public function renderList()
	{
		$this->template->exercises = $this->context->exercises->findAll();
	}

}
