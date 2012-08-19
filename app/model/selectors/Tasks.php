<?php

class Tasks extends Table
{

	/**
	 * @param User $student
	 * @return Selection[]
	 */
	public function findByStudent(User $student)
	{
		$selections = [];
		$selections[] = $this->findBy(['user_id' => $student->id]);
		foreach ($student->getGroupsBelongingTo() as $group) {
			$selections[] = $group->getTasks();
		}

		return $selections;
	}



	/**
	 * @param User $student
	 * @return Selection[]
	 */
	public function findByStudentFromCoach(User $student, User $coach)
	{
		$selections = [];
		$selections[] = $this->findBy([
			'user_id' => $student->id,
			'coach_id' => $coach->id,
		]);
		foreach ($student->getGroupsBelongingTo($coach) as $group) {
			$selections[] = $group->getTasks();
		}

		return $selections;
	}



	public function findByGroup(Group $group)
	{
		return $this->findBy(['group_id' => $group->id]);
	}

}
