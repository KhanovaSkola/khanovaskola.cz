
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

	public function getCoach()
	{
		return $this->context->users->find($this->coach_id);
	}



	public function isBoundToGroup()
	{
		return (bool) $this->group_id;
	}



	public function isVideo()
	{
		return (bool) $this->video_id;
	}



	public function isNotInitialized()
	{
		return $this->video_id === NULL && $this->exercise_id === NULL;
	}



	public function getStudent()
	{
		return $this->context->users->find($this->user_id);
	}



	public function getGroup()
	{
		return $this->context->groups->find($this->group_id);
	}



	public function getVideo()
	{
		return $this->context->videos->find($this->video_id);
	}



	public function getExercise()
	{
		return $this->context->exercises->find($this->exercise_id);
	}



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

}
