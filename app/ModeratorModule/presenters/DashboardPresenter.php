<?php

namespace ModeratorModule;

class DashboardPresenter extends BaseModeratorPresenter
{

	public function renderDefault()
	{
		$cat = [];
		$cat['description'] = $this->context->categories->findBy(['description' => '']);
		$this->template->cat = $cat;
		
		$vid = [];
		$vid['description'] = $this->context->videos->findBy(['description' => '']);
		$vid['exercise'] = $this->context->videos->findBy(['exercise_id' => NULL]);
		$this->template->vid = $vid;
	}
	
	
	
	public function handleAddExercise()
	{
		$exercise = $this->context->exercises->insert([]);
		$this->redirect(':Front:Exercise:edit', ['eid' => $exercise->id]);
	}
	
}
