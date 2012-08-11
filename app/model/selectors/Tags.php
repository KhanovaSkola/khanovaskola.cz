<?php

class Tags extends Table
{

	/**
	 * @param Video $video
	 * @return Selection
	 */
	public function findByVideo(Video $video)
	{
		return $this->getTable()->where('id', $video->getTagsIds());
	}



	public function getFill()
	{
		return $this->findAll()->fetchPairs('id', 'label');
	}

}
