<?php

namespace Selector;

use Entity\Video;


class Tags extends \ORM\Table
{

	/**
	 * @param Video $video
	 * @return Tag[]
	 */
	public function findByVideo(Video $video)
	{
		return $this->findBy(['id' => $video->getTagsIds()]);
	}


	/**
	 * @return array
	 */
	public function getFill()
	{
		return $this->findBy(['id != ?' => $this->findDubTag()->id])
			->order('label')->fetchPairs('id', 'label');
	}


	/**
	 * @return Tag
	 */
	public function findDubTag()
	{
		return $this->findOneBy(['label' => 'dabované']);
	}

}
