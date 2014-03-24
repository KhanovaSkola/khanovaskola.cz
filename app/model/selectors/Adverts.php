<?php

namespace Selector;

use Entity\Video;
use Nette\Caching\Cache;


class Adverts extends \ORM\Table
{

	/**
	 * @param Video $video
	 * @return Video[]
	 */
	public function findByVideo(Video $video)
	{
		return $this->findBy(['video_id' => $video->id]);
	}

}
