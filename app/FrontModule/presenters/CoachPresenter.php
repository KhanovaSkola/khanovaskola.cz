<?php

namespace FrontModule;


class CoachPresenter extends BaseFrontPresenter
{

	/** @persistent */
	public $gid;



	public function startup()
	{
		if (!$this->user->loggedIn && $this->action != 'aboutFeature') {
			$this->redirect('aboutFeature');
		}

		parent::startup();
	}



	public function handleAddGroup()
	{
		$group = $this->context->groups->insert([
			'user_id' => $this->user->id,
			'label' => 'Nová skupina',
		]);

		$this->redirect('edit', ['gid' => $group->id]);
	}



	public function renderGroup()
	{
		$this->template->group = $this->context->groups->find($this->gid);
	}



	public function renderEdit()
	{
		$group = $this->context->groups->find($this->gid);
		$this->template->group = $group;

		$f = $this['usersForm'];
		$f['label']->setValue($group->label);
		foreach ($group->getUsers() as $student) {
			$f["{$student->id}_student"]->setValue(TRUE);
		}
	}



	public function createComponentUsersForm($name)
	{
		$group = $this->context->groups->find($this->gid);

		$form = new \Nette\Application\UI\Form($this, $name);

		$form->addGroup('');
		$form->addText('label');

		$form->addGroup('V této skupině:');
		foreach ($group->getUsers() as $student) {
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
			if ($g->id == $group->id) {
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



	/**
	 * @todo prevent users from adding users they cannot view! ie check the ids
	 */
	public function onSuccessUsersForm($form)
	{
		$group = $this->context->groups->find($this->gid);

		$values = $form->values;
		$group->label = $values['label'];
		unset($values['label']);
		$group->update();

		$ids = [];
		foreach ($values as $key => $value) {
			if ($value) {
				$ids[] = explode("_", $key)[0];
			}
		}

		$group->setUsers($ids);
		$this->redirect('this');
	}



	public function handleRemove()
	{
		$this->context->groups->find($this->gid)->delete();

		$this->flashMessage('Skupina byla smazána. Studenti vám zůstali a můžete je přiřadit do jiných kategirií.');
		$this->redirect('default');
	}

}
