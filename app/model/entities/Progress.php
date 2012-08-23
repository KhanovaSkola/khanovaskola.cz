<?php

/**
 * @property int	$video_id
 * @property int	$user_id
 * @property double	$percent
 * @property string	$timestamp
 */
class Progress extends Entity
{

	/**
	 * @return Video
	 */
	public function getVideo()
	{
		return $this->context->videos->find($this->video_id);
	}


	/**
	 * @return User
	 */
	public function getUser()
	{
		return $this->context->users->find($this->user_id);
	}

}
