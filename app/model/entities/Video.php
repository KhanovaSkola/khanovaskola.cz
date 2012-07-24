<?php

class Video extends Entity
{
	
	/**
	 * @return Video
	 */
	public function getCategory()
	{
		return $this->context->categories->findOneBy(['id' => $this->category_id]);
	}

	
	
	/** 
	 * @return Video
	 */
	public function getNextVideo()
	{
		return $this->getAdjacentVideo(+1);
	}
	
	
	
	/** 
	 * @return Video
	 */
	public function getPreviousVideo()
	{
		return $this->getAdjacentVideo(-1);
	}
	
	
	
	/** 
	 * @return Video
	 */
	protected function getAdjacentVideo($offset)
	{
		return $this->context->videos->findOneBy(['category_id' => $this->category_id, 'position' => $this->position + $offset]);
	}
	
	
	
	/**
	 * @return Exercise
	 */
	public function getExercise()
	{
		return $this->context->exercises->findOneBy(['id' => $this->exercise_id]);
	}
	
}
