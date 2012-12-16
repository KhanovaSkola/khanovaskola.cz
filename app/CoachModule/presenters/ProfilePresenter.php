<?php

namespace CoachModule;


class ProfilePresenter extends BaseCoachPresenter
{

	/** @persistent */
	public $pid;

	/** @var \User */
	protected $profile;

	/** @persistent */
	public $gid = NULL;

	/** @var \Group */
	protected $group = NULL;



	public function startup()
	{
		parent::startup();

		$this->profile = $this->context->users->find($this->pid);
		if (!$this->profile) {
			throw new \Nette\Application\BadRequestException;
		}

if (FALSE && !$this->user->entity->canView($this->profile)) {
			throw new \Nette\Application\ForbiddenRequestException();
		}

		$this->group = $this->gid ? $this->context->groups->find($this->gid) : NULL;
		if ($this->group) {
			if (!$this->group->belongsTo($this->user->entity)) {
				throw new \Nette\Application\ForbiddenRequestException();
			}
			if (!$this->group->containsStudent($this->profile)) {
				throw new \Nette\Application\ForbiddenRequestException();
			}
		}
	}



	public function renderDefault()
	{
		$this->template->profile = $this->profile;
		$this->template->group = $this->group;
	}



	public function handleAddTask()
	{
		$data = [
			'coach_id' => $this->user->id,
			'user_id' => $this->profile->id,
		];

		$task = $this->context->tasks->insert($data);

		$this->redirect('Task:', [
			'gid' => $this->gid,
			'tid' => $task->id,
		]);
	}

}