<?php

/**
 * @property string	$role		Semicolon separated roles
 * @property string $mail
 * @property string $password	hashed
 * @property string $salt
 * @property string $name
 */
class User extends Entity
{

	public function addCoach(User $coach)
	{
		try {
			$this->context->database->table('coach')->insert([
				'coach_id' => $coach->id,
				'user_id' => $this->id,
			]);
		} catch (PDOException $e) {
			if ($e->getCode() != 23000) { // not duplicate
				throw $e;
			} else {
				return FALSE;
			}
		}

		return TRUE;
	}



	public function removeCoach(User $coach)
	{
		$this->context->database->table('coach')->where([
			'coach_id' => $coach->id,
			'user_id' => $this->id,
		])->delete();
	}



	public function getCoaches()
	{
		$ids = [];
		foreach ($this->context->database->table('coach')->where(['user_id' => $this->id]) as $row) {
			$ids[] = $row['coach_id'];
		}

		return $this->context->users->findBy(['id' => $ids]);
	}



	public function getStudents()
	{
		$ids = [];
		foreach ($this->context->database->table('coach')->where(['coach_id' => $this->id]) as $row) {
			$ids[] = $row['user_id'];
		}

		return $this->context->users->findBy(['id' => $ids]);
	}



	public function hasStudents()
	{
		return $this->context->database->table('coach')->where(['coach_id' => $this->id])->count();
	}



	public function setProgress(Video $video, $progress)
	{
		$data = [
			'video_id' => $video->id,
			'user_id' => $this->id,
		];

		$db = $this->context->database;
		$db->beginTransaction();
		$db->table('progress')->where($data)->delete();
		$data['percent'] = $progress;
		$db->table('progress')->insert($data);
		$db->commit();
	}



	public function getAllProgress(array $filters = NULL)
	{
		$filters = $filters ?: [];
		$filters['user_id'] = $this->id;

		return $this->context->progress->findBy($filters)->order('timestamp DESC');
	}



	/**
	 * Returns list of progresses in last month
	 * @return Progress[]
	 */
	public function getRecentlyWatched()
	{
		return $this->getAllProgress(['`timestamp` > DATE_SUB(now(), INTERVAL 1 MONTH)']);
	}



	/**
	 * @param Video $video
	 * @return Progress
	 */
	public function getProgress(Video $video)
	{
		return $this->context->progress->findOneBy([
			'video_id' => $video->id,
			'user_id' => $this->id,
		]);
	}



	/**
	 * @return bool
	 */
	public function canView(User $user)
	{
		if ($user->id === $this->id)
			return TRUE;

		return $this->context->database->table('coach')->where([
			'coach_id' => $this->id,
			'user_id' => $user->id,
		])->count() > 0;
	}

}
