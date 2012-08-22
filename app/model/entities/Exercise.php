<?php

/**
 * @property string	$label
 * @property string	$slug	Webalized $label
 * @property string	$file
 */
class Exercise extends Entity
{

	public function getRelatedVideos()
	{
		return $this->context->videos->findByExercise($this);
	}



	public function getDescription()
	{
		if ($this->getRelatedVideos()->count()) {
			$desc = [];
			$labels = [];
			foreach ($this->getRelatedVideos() as $video) {
				if ($video->description) {
					$desc[] = $video->description;
				}
				$labels[] = $video->label;
			}

			if (count($desc)) {
				return implode(' ', $desc);
			} else {
				return "Cvičení {$this->label} na Khanově škole pro lekc" . (count($labels) > 1 ? 'e ' : 'i ') . implode(', ', $labels);
			}
		}

		return "Cvičení {$this->label} na Khanově škole.";
	}

}
