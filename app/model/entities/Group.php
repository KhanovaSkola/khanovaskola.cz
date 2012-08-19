<?php

/**
 * @property int	$user_id
 * @property string	$label
 */
class Group extends Entity
{

	public function getCoach()
	{
		return $this->context->users->find($this->user_id);
	}



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

}
