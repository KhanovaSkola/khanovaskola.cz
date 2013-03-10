<?php

namespace Entity;


/**
 * @property string	$role		Semicolon separated roles
 * @property string $mail
 * @property string $password	hashed
 * @property string $salt
 * @property string $name
 * @property string $facebook_id
 * @property string $google_id
 * @property int $registartion	unix timestamp
 * @property int $last_login	unix timestamp
 */
class User extends \ORM\Entity
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

		return $this->context->users->findBy(['id' => array_values($ids)]);
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
	public function setProgress(Video $video, Category $category, $seconds, $onWatchedCallback = NULL)
	{
		$data = [
			'video_id' => $video->id,
			'category_id' => $category->id,
			'user_id' => $this->id,
		];

		$percent = 0;
		if ($video->duration !== 0) {
			$percent = $seconds == -1 ? 100 : $seconds / $video->duration * 100;
		}

		$db = $this->context->database;
		$db->beginTransaction();

		$db->table('progress')->where($data)->delete();
		$data['percent'] = $percent;
		$db->table('progress')->insert($data);

		if ($onWatchedCallback && $percent > $this->context->parameters['progress']['completed_threshold']) {
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
		])->group('exercise_id', 'Count(*) > 3')->order('timestamp DESC');

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
	public function canViewId($user_id)
	{
		if ($user_id === $this->id)
			return TRUE;

		return $this->context->database->table('coach')->where([
			'coach_id' => $this->id,
			'user_id' => $user_id,
		])->count() > 0;
	}



	/**
	 * @return bool
	 */
	public function canView(User $user)
	{
		return $this->canViewId($user->id);
	}



	/**
	 * @return Group[]
	 */
	public function getGroups()
	{
		return $this->context->groups->findBy(['user_id' => $this->id])->order('label ASC');
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
		$boundary = $this->context->parameters['progress']['exercise_limit'];

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


	public function saveExerciseAnswer($exercise_id, $correct, $time, $onMasteryCallback = NULL)
	{
		$exercise = $this->context->exercises->find($exercise_id);
		if (!$exercise) {
			return FALSE;
		}

		$answer = $this->context->database->table('answer')->insert([
			'exercise_id' => $exercise->id,
			'user_id' => $this->id,
			'correct' => $correct ? 1 : 0,
			'time' => $time,
		]);

		$masteryThreshold = $this->context->parameters['progress']['exercise_mastery'];
		$struggleThreshold = $this->context->parameters['progress']['exercise_struggle'];
		$skill = $this->getExerciseSkill($exercise);

		// @todo DRY [from getExerciseSkill]
		$boundary = $this->context->parameters['progress']['exercise_limit'];
		$res = $this->context->database->queryArgs('SELECT Count(*) AS count, Avg(tmp.correct) AS score FROM (
			SELECT correct FROM answer
			WHERE exercise_id = ? AND user_id = ?
			ORDER BY timestamp DESC
			) AS tmp LIMIT ?', [$exercise->id, $this->id, $boundary])->fetch();


		if ($res['count'] < $boundary) {
			$this->setExerciseStatus($exercise, Exercise::STARTED);

		} else if (100 * $skill > $masteryThreshold) {
			$this->setExerciseStatus($exercise, Exercise::PROFICIENT);
			if ($onMasteryCallback) {
				$onMasteryCallback();
			}

		} else if (100 * $skill < $struggleThreshold) {
			$this->setExerciseStatus($exercise, Exercise::STRUGGLING);

		} else {
			$this->setExerciseStatus($exercise, Exercise::REVIEW);
		}


		return $answer;
	}



	public function setExerciseStatus($exercise, $status)
	{
		if ($this->getCurrentExerciseStatus($exercise) !== $status) {
			$this->context->database->query('INSERT INTO `exercise_status` (exercise_id, user_id, status)
				VALUES (?, ?, ?)', $exercise->id, $this->id, $status);
		}
	}



	public function getCurrentExerciseStatus($exercise)
	{
		$res = $this->context->database->query('SELECT status FROM exercise_status
			WHERE exercise_id=? AND user_id=? ORDER BY id DESC LIMIT 1', $exercise->id, $this->id)->fetch();

		if ($res) {
			return $res['status'];
		}
		return NULL;
	}



	public function getExerciseStatuses()
	{
		return $this->context->database->query('SELECT status, Date(timestamp) as date FROM exercise_status
			WHERE user_id=? ORDER BY timestamp ASC, id ASC', $this->id);
	}



	public function getExerciseSkillByDate()
	{
		$res = [];
		$buffer = 0;
		$last_date = NULL;
		foreach ($this->getExerciseStatuses() as $row) {
			if ($last_date !== NULL && $row['date']->getTimestamp() !== $last_date->getTimestamp()) {
				$res[$last_date->getTimestamp()] = $buffer;
			}
			switch ($row['status']) {
				case Exercise::REVIEW:
					$buffer += 1; break;
				case Exercise::PROFICIENT:
					$buffer += 3; break;
			}
			$last_date = $row['date'];
		}
		if ($last_date) {
			$res[$last_date->getTimestamp()] = $buffer;
		}

		// fill gaps up to today
		$count = count($res);
		$day = new \DateInterval('P1D');
		$first = TRUE;
		$today = new \Nette\DateTime();
		foreach ($res as $stamp => $skill) {
			$date = new \Nette\DateTime();
			$date->setTimestamp($stamp);

			if ($first) {
				$tomorrow = clone $date;
				$res[$tomorrow->sub($day)->getTimestamp()] = 0;
				$first = FALSE;
			}

			$next = $date->add($day);
			while (!isset($res[$next->getTimestamp()]) && $next < $today) {
				$res[$next->getTimestamp()] = $skill;
				$next = $next->add($day);
			}
		}
		ksort($res);

		$return = [];
		foreach ($res as $stamp => $value) {
			$date = new \Nette\DateTime();
			$date->setTimestamp($stamp);
			$return[$date->format('Y-m-d')] = $value;
		}

		return $return;
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



	public function getSecurityCode($time = NULL)
	{
		$time = $time ?: time();
		return $time . ':' . md5($time . $this->id . $this->mail . $this->salt);
	}



	public function getAnswers(Exercise $exercise)
	{
		return $this->context->database->queryArgs('SELECT * FROM answer WHERE user_id=? AND exercise_id=? ORDER BY timestamp, id', [$this->id, $exercise->id]);
	}



	public function getLastName()
	{
		$split = explode(" ", $this->name);
		return end($split);
	}

}
