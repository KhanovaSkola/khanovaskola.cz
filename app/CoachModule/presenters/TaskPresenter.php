<?php

namespace CoachModule;

use \Nette\Caching\Cache;


class TaskPresenter extends BaseCoachPresenter
{

	/** @persistent */
	public $tid;

	/** @persistent */
	public $gid = NULL;

	/** @var \Task */
	protected $task;



	public function startup()
	{
		parent::startup();

		$this->task = $this->context->tasks->find($this->tid);
		if (!$this->task) {
			throw new \Nette\Application\BadRequestException;
		}

		if (!$this->task->belongsTo($this->user->entity)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}
	}



	public function renderDefault()
	{
		$this->template->task = $this->task;
		$this['editForm']['task']->setValue($this->task->isVideo() ? "video_{$this->task->video_id}" : "exercise_{$this->task->exercise_id}");
		$this->template->gid = $this->gid;

		if ($this->task->deadline && $this->task->deadline->format('U') > 0) {
			$this['editForm']['deadline']->setValue($this->task->deadline->format('Y-m-d'));
		}
	}



	public function handleRemove()
	{
		$tags = $this->task->getTagsToInvalidate();
		$this->task->delete();

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => $tags]);

		$this->flashMessage('Úkol byl smazán.');

		if ($this->task->isBoundToGroup()) {
			$this->redirect('Group:', ['gid' => $this->task->group_id]);
		} else {
			$this->redirect('Profile:', [
				'gid' => $this->gid,
				'pid' => $this->task->user_id,
			]);
		}
	}



	public function createComponentEditForm($name)
	{
		$form = $this->createForm($name);

		$form->addSelect('task', 'Úkol', $this->getFill());
		$form->addText('deadline', 'Nejpozději do');

		$form->addSubmit('send', 'Uložit');
		return $form;
	}



	protected function getFill()
	{
		$data = [];

		$unique = [];

		$data['——————— Lekce ———————'] = [];
		foreach ($this->context->categories->findLeaves() as $category) {
			$node = [];
			foreach ($category->getVideos() as $video) {
				$key = "video_{$video->id}";
				if (!in_array($key, $unique)) {
					$unique[] = $key;
					$node[$key] = $video->label;
				}
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



	public function onSuccessEditForm($form)
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
		$this->task->completed = FALSE;

		if (!$this->task->isBoundToGroup()) {
			if ($this->task->checkCompleted()) {
				$this->task->setCompleted();
			}
		}

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => $this->task->getTagsToInvalidate()]);

		$this->task->update();
		$this->redirect('this');
	}

}
