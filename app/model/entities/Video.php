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
	
}
