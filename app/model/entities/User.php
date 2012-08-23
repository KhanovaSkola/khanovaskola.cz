<?php

/**
 * @property string	$role		Semicolon separated roles
 * @property string $mail
 * @property string $password	hashed
 * @property string $salt
 * @property string $name
 * @property string $facebook_id
 * @property string $google_id
 */
class User extends Entity
{

    /**
     * @param User $coach
     * @return bool
     * @throws PDOException
     */
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


    /**
     * @return User[]
     */
    public function getCoaches()
	{
		$ids = [];
		foreach ($this->context->database->table('coach')->where(['user_id' => $this->id]) as $row) {
			$ids[] = $row['coach_id'];
		}

		return $this->context->users->findBy(['id' => $ids]);
	}


    /**
     * @return User[]
     */
    public function getStudents()
	{
		$ids = [];
		foreach ($this->context->database->table('coach')->where(['coach_id' => $this->id]) as $row) {
			$ids[] = $row['user_id'];
		}

		return $this->context->users->findBy(['id' => $ids]);
	}


    /**
     * @return User[]
     */
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


    /**
     * @return bool
     */
    public function hasStudents()
	{
		return (bool) $this->context->database->table('coach')->where(['coach_id' => $this->id])->count();
	}



	/**
	 *
	 * @param Video $video
	 * @param type $seconds
	 * @param type $onWatchedCallback
	 * @return type
	 */
	public function setProgress(Video $video, $seconds, $onWatchedCallback = NULL)
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

		if ($percent > $this->context->params['progress']['completed_threshold']) {
			$onWatchedCallback();
		}

		$db->commit();
	}


    /**
     * @param array $filters
     * @return Progress[]
     */
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


    /**
     * @param User $coach
     * @return Group[]
     */
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


    /**
     * @param Exercise $exercise
     * @return float 0..1
     */
    public function getExerciseSkill(Exercise $exercise)
	{
		$boundary = $this->context->params['progress']['exercise_limit'];

		$res = $this->context->database->queryArgs('SELECT Count(*) AS count, Avg(tmp.correct) AS score FROM (
			SELECT correct FROM answer
			WHERE exercise_id = ? AND user_id = ?
			ORDER BY timestamp DESC
			) AS tmp LIMIT ?', [$exercise->id, $this->id, $boundary])->fetch();

		$count = $res['count'];
		$score = $res['score'];
		if ($count < $boundary) {
			$score = $score * $count / $boundary;
		}

		return $score;
	}


    public function saveExerciseAnswer($file, $correct, $onMasteryCallback = NULL)
	{
		$exercise = $this->context->exercises->findOneBy(['file' => $file]);
		if (!$exercise) {
			return FALSE;
		}

		$answer = $this->context->database->table('answer')->insert([
			'exercise_id' => $exercise->id,
			'user_id' => $this->id,
			'correct' => $correct ? 1 : 0
		]);

		$masteryThreshold = $this->context->params['progress']['completed_threshold'];
		if ($onMasteryCallback && 100 * $this->getExerciseSkill($exercise) > $masteryThreshold) {
			$onMasteryCallback();
		}

		return $answer;
	}


    /**
     * @return bool
     */
    public function hasTasks()
	{
		return (bool) $this->getTasks()->count();
	}


    /**
     * @param User $coach
     * @return bool
     */
    public function hasTasksFromCoach(User $coach)
	{
		return (bool) $this->getTasksFromCoach($coach)->count();
	}



    /**
     * @return mixed
     */
    public function getTasks()
	{
		return $this->context->tasks->findByStudent($this);
	}


    /**
     * @param User $coach
     * @return mixed
     */
    public function getTasksFromCoach(User $coach)
	{
		return $this->context->tasks->findByStudentFromCoach($this, $coach);
	}



	/**
	 * @param Video $video
	 * @return Video
	 */
	public function getTaskForVideo(Video $video)
	{
		return $this->getTasks()->where([
			'video_id' => $video->id
		])->fetch();
	}



	/**
	 * @param Exercise $exercise
	 * @return Video
	 */
	public function getTaskForExercise(Exercise $exercise)
	{
		return $this->getTasks()->where([
			'exercise_id' => $exercise->id
		])->fetch();
	}

}
