<?php

namespace CoachModule;

use \Nette\Caching\Cache;
use \Entity\Video;
use \Entity\Exercise;


class TaskPresenter extends BaseCoachPresenter
{

	/** @persistent */
	public $tid;

	/** @var \Task */
	protected $task;

	/** @persistent */
	public $gid = NULL;

	/** @var \Group */
	protected $group;

	/** @persistent */
	public $pid = NULL;

	/** @var \User */
	protected $profile;



	public function startup()
	{
		parent::startup();

		if ($this->gid) {
			$this->group = $this->context->groups->find($this->gid);
			if (!$this->group) {
				throw new \Nette\Application\BadRequestException;
			}
		}

		if ($this->pid) {
			$this->profile = $this->context->users->find($this->pid);
			if (!$this->profile) {
				throw new \Nette\Application\BadRequestException;
			}
		}

		if ($this->action === 'add') {
			return;
		}

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



	public function renderAdd()
	{
		$this->template->group = $this->group;
		$this->template->profile = $this->profile;
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

		$form->addSubmit('send', 'Uložit')->getControlPrototype()->class = "simple-button green";
		return $form;
	}



	protected function getFill()
	{
		$data = [];
		$keys = [];

		foreach ($this->context->categories->findLeaves() as $category) {
			$node = [];
			foreach ($category->getContent() as $entity) {
				$base = ($entity instanceof Video ? "video" : "exercise") . "_{$entity->id}";
				$key = $base;
				$i = 2;
				while (in_array($key, $keys)) {
					$key = $base . '_' . $i;
					$i++;
				}
				$keys[] = $key;
				$node[$key] = $entity->label . ' (' . ($entity instanceof Video ? 'lekce' : 'cvičení') .')';
			}

			$data[$category->label] = $node;
		}

		return $data;
	}



	public function onSuccessEditForm($form)
	{
		$v = $form->values;
		list($type, $id) = explode('_', $v->task);

		if ($this->action === 'add') {
			$data = ['coach_id' => $this->user->id];
			if ($this->group) {
				$data['group_id'] = $this->group->id;
			} else {
				$data['user_id'] = $this->profile->id;
			}
			$tmp = $this->context->tasks->insert($data);
			$this->task = $this->context->tasks->find($tmp->id);
		}

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
		if ($this->task->isBoundToGroup()) {
			$this->redirect('Group:', ['gid' => $this->task->group_id]);
		} else {
			$this->redirect('Profile:', ['pid' => $this->task->user_id]);
		}
	}

}
