<?php

namespace Selector;

use Entity\Video;
use Nette\Caching\Cache;


class Adverts extends \ORM\Table
{

	public function markResolved($vid)
	{
		return $this->connection->query('
			UPDATE `advert`
			SET `online` = 1
			WHERE `video_id` = ?
		', $vid);
	}

	/**
	 * @param Video $video
	 * @return Video[]
	 */
	public function findByVideo(Video $video)
	{
		return $this->findBy(['video_id' => $video->id]);
	}

}
