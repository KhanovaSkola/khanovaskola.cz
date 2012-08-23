<?php

class Tags extends Table
{

	/**
	 * @param Video $video
	 * @return Tag[]
	 */
	public function findByVideo(Video $video)
	{
		return $this->getTable()->where('id', $video->getTagsIds());
	}


	/**
	 * @return array
	 */
	public function getFill()
	{
		return $this->findAll()->fetchPairs('id', 'label');
	}


	/**
	 * @return Tag
	 */
	public function findDubTag()
	{
		return $this->findOneBy(['label' => 'dabované']);
	}

}
