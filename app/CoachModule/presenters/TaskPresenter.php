<?php

namespace CoachModule;


class TaskPresenter extends BaseCoachPresenter
{

	/** @persistent */
	public $tid;

	/** @var Task */
	protected $task;



	public function startup()
	{
		parent::startup();

		$this->task = $this->context->tasks->find($this->tid);
	}



	public function renderDefault()
	{
		$this->template->task = $this->task;
		$this['editForm']['task']->setValue($this->task->isVideo() ? "video_{$this->task->video_id}" : "exercise_{$this->task->exercise_id}");

		if ($this->task->deadline) {
			$this['editForm']['deadline']->setValue($this->task->deadline->format('Y-m-d'));
		}
	}



	public function handleRemove()
	{
		$this->task->delete();

		$this->flashMessage('Úkol byl smazán.');

		if ($this->task->isBoundToGroup()) {
			$this->redirect('Group:', ['gid' => $this->task->group_id]);
		} else {
			$this->redirect('Profile:', ['pid' => $this->task->user_id]);
		}
	}



	public function createComponentEditForm($name)
	{
		$form = new \Nette\Application\UI\Form($this, $name);

		$form->addSelect('task', 'Úkol', $this->getFill());
		$form->addText('deadline', 'Nejpozději do');

		$form->addSubmit('send', 'Uložit');
		$form->onSuccess[] = callback($this, 'onSuccessEdit');

		return $form;
	}



	protected function getFill()
	{
		$data = [];

		$data['——————— Lekce ———————'] = [];
		foreach ($this->context->categories->findLeaves() as $category) {
			$node = [];
			foreach ($category->getVideos() as $video) {
				$node["video_{$video->id}"] = $video->label;
			}

			$data[$category->label] = $node;
		}

		$data[''] = []; // splitter

		$exs = [];
		foreach ($this->context->exercises->findAll() as $exercise) {
			$exs["exercise_{$exercise->id}"] = $exercise->label;
		}
		$data['——————— Cvičení ———————'] = $exs;

		return $data;
	}



	public function onSuccessEdit($form)
	{
		$v = $form->values;
		list($type, $id) = explode('_', $v->task);

		if ($type === 'exercise') {
			$this->task->exercise_id = $id;
			$this->task->video_id = NULL;
		} else {
			$this->task->exercise_id = NULL;
			$this->task->video_id = $id;
		}

		$this->task->deadline = $v['deadline'];

		$this->task->update();
		$this->redirect('this');
	}

}
