<?php

namespace CoachModule;


class DashboardPresenter extends BaseCoachPresenter
{

	public function actionDefault()
	{
		if (!$this->user->entity->hasStudents()) {
			$this->forward('noStudents');
		}
	}



	public function handleAddGroup()
	{
		$group = $this->context->groups->insert([
			'user_id' => $this->user->id,
			'label' => 'Nová skupina',
		]);

		$this->redirect('Group:edit', ['gid' => $group->id]);
	}

}
