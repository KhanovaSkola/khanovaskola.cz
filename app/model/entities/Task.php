
<?php

/**
 * @property int	$coach_id
 * @property int	$user_id		$user_id XOR $group_id IS NULL
 * @property int	$group_id		--//--
 * @property int	$video_id		$video_id XOR $exercise_id IS NULL
 * @property int	$exercise_id	--//--
 * @property bool	$completed
 * @property string	$deadline		mysql date
 * @property string	$timestamp		last update
 */
class Task extends Entity
{

    /**
     * @return User
     */
    public function getCoach()
	{
		return $this->context->users->find($this->coach_id);
	}


    /**
     * @return bool
     */
    public function isBoundToGroup()
	{
		return (bool) $this->group_id;
	}


    /**
     * @return bool
     */
    public function isVideo()
	{
		return (bool) $this->video_id;
	}


    /**
     * @return bool
     */
    public function isNotInitialized()
	{
		return $this->video_id === NULL && $this->exercise_id === NULL;
	}


    /**
     * @return User
     */
    public function getStudent()
	{
		return $this->context->users->find($this->user_id);
	}


    /**
     * @return Group
     */
    public function getGroup()
	{
		return $this->context->groups->find($this->group_id);
	}


    /**
     * @return Video
     */
    public function getVideo()
	{
		return $this->context->videos->find($this->video_id);
	}


    /**
     * @return Exercise
     */
    public function getExercise()
	{
		return $this->context->exercises->find($this->exercise_id);
	}


    /**
     * @param bool $value
     * @return Task
     */
    public function setCompleted($value = TRUE)
	{
		$this->completed = $value;
		return $this;
	}


    /**
     * @return string
     */
    public function getText()
	{
		if ($this->isNotInitialized()) {
			return 'Nový úkol';

		} elseif ($this->isVideo()) {
			$task = 'Podívat se na lekci ' . lcFirst($this->getVideo()->label);

		} else {
			$task = 'Vyplnit správně cvičení ' . lcFirst($this->getExercise()->label);
		}

		$task .= $this->deadline ? ' nejpozději do ' . date('d. n. y', strToTime($this->deadline)) : '';

		return $task;
	}


    /**
     * @return bool
     */
    public function checkCompleted()
	{
		if ($this->isBoundToGroup()) {
			throw new \Nette\NotImplementedException();

		} else {
			$student = $this->getStudent();
			if ($this->isVideo()) {
				$threshold = $this->context->params['progress']['completed_threshold'];
				if ($student->getProgress($this->getVideo())->percent >= $threshold) {
					return TRUE;
				}
			} else {
				$threshold = $this->context->params['progress']['exercise_mastery'];
				if ($student->getExerciseSkill($this->getExercise()) * 100 >= $threshold) {
					return TRUE;
				}
			}
		}

		return FALSE;
	}


    /**
     * @return array
     */
    public function getTagsToInvalidate()
	{
		$invalid = [];
		if ($this->isBoundToGroup()) {
			$invalid[] = "coach/group/tasks/{$this->group_id}";
			foreach ($this->getGroup()->getStudents() as $student) {
				$invalid[] = "coach/{$this->coach_id}/profile/{$student->id}";
				$invalid[] = "profile/tasks/{$student->id}";
			}
		} else {
			$invalid[] = "coach/{$this->coach_id}/profile/{$this->user_id}";
			$invalid[] = "profile/tasks/{$this->user_id}";
		}

		return $invalid;
	}

}
