<?php

namespace CoachModule;

use \Nette\Caching\Cache;


class GroupPresenter extends BaseCoachPresenter
{

	/** @persistent */
	public $gid;

	/** @var \Group */
	protected $group;



	public function startup()
	{
		parent::startup();

		$this->group = $this->context->groups->find($this->gid);
		if (!$this->group->belongsTo($this->user->entity)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}
	}



	public function renderDefault()
	{
		$this->template->group = $this->group;
	}



	public function renderEdit()
	{
		$this->template->group = $this->group;

		$f = $this['usersForm'];
		$f['label']->setValue($this->group->label);
		foreach ($this->group->getUsers() as $student) {
			$f["{$student->id}_student"]->setValue(TRUE);
		}
	}



	public function createComponentUsersForm($name)
	{
		$form = new \Nette\Application\UI\Form($this, $name);

		$form->addGroup('');
		$form->addText('label');

		$form->addGroup('V této skupině:');
		foreach ($this->group->getUsers() as $student) {
			$form->addCheckbox("{$student->id}_student", $student->name);
		}

		$first = TRUE;
		foreach ($this->user->entity->getStudentsWithoutGroup() as $student) {
			if ($first) {
				$form->addGroup('Studenti, které nemáte v žádné skupině:');
				$first = FALSE;
			}
			$form->addCheckbox("{$student->id}_student", $student->name);
		}

		foreach ($this->user->entity->getGroups() as $g) {
			if ($g->id == $this->group->id) {
				continue;
			}

			$first = TRUE;
			foreach ($g->getUsers() as $student) {
				if ($first) {
					$form->addGroup($g->label);
					$first = FALSE;
				}
				try {
					$form->addCheckbox("{$student->id}_student", $student->name);
				} catch (\Nette\InvalidStateException $e) {
					// ignore, this will only show user in ONE group, so if user is in multiple groups, it will only show ONCE
					/** @todo fix */
				}
			}
		}

		$form->addSubmit('send', 'Uložit');
		$form->onSuccess[] = callback($this, 'onSuccessUsersForm');

		return $form;
	}



	public function onSuccessUsersForm($form)
	{
		$values = $form->values;
		$this->group->label = $values['label'];
		unset($values['label']);
		$this->group->update();

		$ids = [];
		foreach ($values as $key => $value) {
			if ($value) {
				$id = explode("_", $key)[0];
				if (!$this->user->entity->canViewId($id)) {
					$form->addError('Nemůžete do skupiny přidat tohoto člena, protože není váš student.');
					return FALSE;
				}
				$ids[] = $id;
			}
		}

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => [
			"coach/groups/{$this->user->id}",
			"coach/group/{$this->group->id}",
		]]);

		$this->group->setUsers($ids);
		$this->redirect('this');
	}



	public function handleRemove()
	{
		$this->group->delete();

		$this->flashMessage('Skupina byla smazána. Studenti vám zůstali a můžete je přiřadit do jiných kategirií.');
		$this->redirect('Dashboard:');
	}



	public function handleAddTask()
	{
		$data = [
			'coach_id' => $this->user->id,
			'group_id' => $this->group->id,
		];

		$task = $this->context->tasks->insert($data);

		$this->redirect('Task:', ['tid' => $task->id]);
	}

}
