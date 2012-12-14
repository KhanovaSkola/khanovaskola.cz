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



	/**
	 * @param Exercise $exercise
	 * @return Category[]
	 */
	public function findByExercise(Exercise $exercise)
	{
		return $this->findBy(['id' => $exercise->getCategoryIds()]);
	}



	/**
	 * @return array
	 */
	public function getFill()
	{
		return $this->findBy(['is_leaf' => TRUE])->order('label')->fetchPairs('id', 'label');
	}



	public function findWithExercises()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT DISTINCT category_id FROM category_exercise') as $row) {
			$ids[] = (int) $row['category_id'];
		}
		return $this->findBy(['id' => $ids]);
	}

}
