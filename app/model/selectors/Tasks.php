<?php

class Tasks extends Table
{

	/**
	 * @param User $student
	 * @return Task[]
	 */
	public function findByStudent(User $student)
	{
		$ids = [];
		foreach ($this->findBy(['user_id' => $student->id]) as $task) {
			$ids[] = $task['id'];
		}
		foreach ($student->getGroupsBelongingTo() as $group) {
			foreach ($group->getTasks() as $task) {
				$ids[] = $task['id'];
			}
		}

		return $this->findBy(['id' => $ids]);
	}



	/**
	 * @param User $student
	 * @return Task[]
	 */
	public function findByStudentFromCoach(User $student, User $coach)
	{
		$ids = [];
		$tasks = $this->findBy([
			'user_id' => $student->id,
			'coach_id' => $coach->id,
		]);
		foreach ($tasks as $task) {
			$ids[] = $task['id'];
		}
		foreach ($student->getGroupsBelongingTo($coach) as $group) {
			foreach ($group->getTasks() as $task) {
				$ids[] = $task['id'];
			}
		}

		return $this->findBy(['id' => $ids]);
	}


	/**
	 * @param Group $group
	 * @return Task
	 */
	public function findByGroup(Group $group)
	{
		return $this->findBy(['group_id' => $group->id]);
	}

}
