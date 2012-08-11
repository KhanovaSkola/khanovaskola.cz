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



	/**
	 * @param bool $secondHalf Return the other half
	 * @return Video[]
	 */
	public function getVideosHalf($secondHalf = FALSE)
	{
		$split = ceil($this->getVideosIds()->count() / 2);

		if (!$secondHalf) {
			return $this->getVideos()->limit($split);

		} else {
			return $this->getVideos()->limit($split, $split);
		}
	}



	/**
	 * @return int[]
	 */
	public function getVideosIds()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT video_id FROM tag_video WHERE tag_id=?', $this->id) as $row) {
			$ids = $row['video_id'];
		}
		return $ids;
	}

}
