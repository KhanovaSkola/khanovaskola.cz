<?php

/**
 * @property int	$user_id
 * @property string	$label
 */
class Group extends Entity
{

	/**
	 * @return User
	 */
	public function getCoach()
	{
		return $this->context->users->find($this->user_id);
	}


	/**
	 * @return User[]
	 */
	public function getUsers()
	{
		return $this->context->users->findByGroup($this);
	}



	public function setUsers(array $ids)
	{
		$data = [];
		foreach ($ids as $id) {
			$data[] = [
				'group_id' => $this->id,
				'user_id' => $id,
			];
		}

		$db = $this->context->database;
		$db->beginTransaction();

		$db->table('group_user')->where(['group_id' => $this->id])->delete();
		if (count($data)) {
			$db->table('group_user')->insert($data);
		}

		$db->commit();
	}



	/**
	 * @return int[]
	 */
	public function getUsersIds()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT user_id FROM group_user WHERE group_id = ?', $this->id) as $row) {
			$ids[] = $row['user_id'];
		}

		return $ids;
	}


	/**
	 * @return bool
	 */
	public function hasTasks()
	{
		return (bool) $this->getTasks()->count();
	}



	/**
	 * @return Task[]
	 */
	public function getTasks()
	{
		return $this->context->tasks->findByGroup($this);
	}


	/**
	 * @param User $coach
	 * @return bool
	 */
	public function belongsTo(User $coach)
	{
		return (int) $coach->id === (int) $this->user_id;
	}



	public function containsStudent(User $student)
	{
		$res = $this->context->database->query('SELECT Count(*) as count FROM group_user WHERE group_id = ? AND user_id = ?', $this->id, $student->id)->fetch();
		return $res['count'];
	}



	public function getExerciseSkillByDate()
	{
		// @todo it might still produce gaps, solve it by gapping up to Now() in user->getExerciseSkillByDate
		$res = [];
		$uids = [];
		foreach ($this->getUsers() as $student) {
			$uids[] = $student->id;
			$skills = $student->getExerciseSkillByDate();
			foreach ($skills as $date => $skill) {
				$res[$date][$student->id] = $skill;
			}
		}
		ksort($res);
dump($res);die;
		// @todo is this required?
		$last = [];
		foreach ($res as &$node) {
			foreach ($uids as $uid) {
				if (!isset($node[$uid])) {
					$node[$uid] = isset($last[$uid]) ? $last[$uid] : 0;
				} else {
					$last[$uid] = $node[$uid];
				}
			}
		}

		return $res;
	}

}
