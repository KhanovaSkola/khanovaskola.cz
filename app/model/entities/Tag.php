<?php

namespace Entity;


/**
 * @property string	$label
 * @property string	$description
 * @property bool 	$display
 */
class Tag extends \ORM\EntityUrl
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
		$count = count($this->getVideosIds());
		if ($count > 10) {
			$split = ceil($count / 2);
		} else {
			$split = 999; // only one column if more than ten videos
		}

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
			$ids[] = $row['video_id'];
		}
		return $ids;
	}



	/**
	 * @return int[]
	 */
	public function getOrderedVideosIds()
	{
		$ids = [];
		foreach ($this->context->videos->findBy(['id' => $this->getVideosIds()]) as $video) {
			$cid = $video->getOneCategoryId();
			$position = $this->context->database->query('SELECT position FROM category_video WHERE category_id=? AND video_id=?', $cid, $video->id)->fetch()->position;
			$ids[$cid * 1000 + $position] = $video->id;
		}
		ksort($ids);
		return $ids;
	}



	/**
	 * @return int seconds
	 */
	public function getDuration()
	{
		$cache = new \Nette\Caching\Cache($this->context->cacheStorage, 'tag_duration');
		if (!isset($cache[$this->id])) {
			$duration = 0;
			foreach ($this->getVideos() as $video) {
				$duration += $video->duration;
			}
			
			$cache->save($this->id, $duration, [
				\Nette\Caching\Cache::TAGS => ["tag/$this->id"],
			]);
			return $duration;
		}

		return $cache[$this->id];
	}

}
