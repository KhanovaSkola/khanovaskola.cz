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

}
