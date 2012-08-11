<?php

/**
 * @property string	$label
 */
class Tag extends Entity
{

	/**
	 * return Video[]
	 */
	public function getVideos()
	{
		return $this->context->videos->findByTag($this);
	}

}
