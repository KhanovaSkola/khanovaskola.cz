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



	public function getStudentsWithoutGroup()
	{
		$ids = [];
		foreach ($this->context->database->table('coach')->where(['coach_id' => $this->id]) as $row) {
			$ids[] = $row['user_id'];
		}
		foreach ($this->getGroups() as $group) {
			$ids = array_diff($ids, $group->getUsersIds());
		}

		return $this->context->users->findBy(['id' => $ids]);
	}



	public function hasStudents()
	{
		return $this->context->database->table('coach')->where(['coach_id' => $this->id])->count();
	}



	public function setProgress(Video $video, $seconds)
	{
		$data = [
			'video_id' => $video->id,
			'user_id' => $this->id,
		];

		$percent = $seconds == -1 ? 100 : $seconds / $video->getDuration() * 100;

		$db = $this->context->database;
		$db->beginTransaction();

		$db->table('progress')->where($data)->delete();
		$data['percent'] = $percent;
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
	 * Returns list of exercises attained in last month
	 * @return [array, Exercise[]]
	 */
	public function getRecentExercises()
	{
		$answers = $this->context->database->table('answer')->where([
			'user_id' => $this->id,
			'`timestamp` > DATE_SUB(now(), INTERVAL 1 MONTH)',
		])->group('exercise_id', 'Count(*) > 3');

		$ids = [];
		$times = [];
		foreach ($answers as $row) {
			$ids[] = $row['exercise_id'];
			$times[] = $row['timestamp'];
		}

		return (object) ['times' => $times, 'selector' => $this->context->exercises->findBy(['id' => $ids])];
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



	/**
	 * @return Group[]
	 */
	public function getGroups()
	{
		return $this->context->groups->findBy(['user_id' => $this->id]);
	}



	public function getGroupsBelongingTo(User $coach = NULL)
	{
		$links = $this->context->database->table('group_user')->where(['user_id' => $this->id]);
		$ids = [];
		foreach ($links as $row) {
			$ids[] = $row['group_id'];
		}

		$filter = ['id' => $ids];
		if ($coach) {
			$filter['user_id'] = $coach->id;
		}

		return $this->context->groups->findBy($filter);
	}



	public function getExerciseSkill(Exercise $exercise)
	{
		$boundary = 30;

		$res = $this->context->database->queryArgs('SELECT Avg(tmp.correct) FROM (
			SELECT correct FROM answer
			WHERE exercise_id = ? AND user_id = ? '
			. str_repeat("UNION ALL SELECT 0 ", $boundary - 1)
			. 'LIMIT ?) tmp', [$exercise->id, $this->id, $boundary])->fetch();
		return end($res);
	}



	public function saveExerciseAnswer($file, $correct)
	{
		$exercise = $this->context->exercises->findOneBy(['file' => $file]);
		if (!$exercise) {
			return FALSE;
		}

		return $this->context->database->table('answer')->insert([
			'exercise_id' => $exercise->id,
			'user_id' => $this->id,
			'correct' => $correct ? 1 : 0
		]);
	}



	public function hasTasks()
	{
		return (bool) $this->getTasks()->count();
	}



	public function hasTasksFromCoach(User $coach)
	{
		return (bool) $this->getTasksFromCoach($coach)->count();
	}



	public function getTasks()
	{
		return $this->context->tasks->findByStudent($this);
	}



	public function getTasksFromCoach(User $coach)
	{
		return $this->context->tasks->findByStudentFromCoach($this, $coach);
	}

}
