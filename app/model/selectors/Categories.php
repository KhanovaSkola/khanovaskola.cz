<?php

class Categories extends Table
{

	/**
	 * @param array $by
	 * @return Category[]
	 */
	public function findRoot()
	{
		return $this->findBy(['parent_id' => NULL])->order('position ASC');
	}


	/**
	 * @return Category[]
	 */
	public function findLeaves()
	{
		return $this->findBy(['is_leaf' => TRUE]);
	}



	/**
	 * @param Video $video
	 * @return Category[]
	 */
	public function findByVideo(Video $video)
	{
		return $this->findBy(['id' => $video->getCategoryIds()]);
	}

}
