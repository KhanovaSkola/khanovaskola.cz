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



	public function findMapRoot()
	{
		$id = $this->context->database->query(
			'SELECT DISTINCT parent_id FROM map WHERE parent_id NOT IN (SELECT DISTINCT child_id FROM map)'
		)->fetch()['parent_id'];

		return $this->find($id);
	}



	public function findByVotes()
	{
		$res = $this->context->database->query(
			'SELECT category_id, Count(*) as `count` FROM want_translated GROUP BY category_id ORDER BY Count(*)'
		);

		$ids = [];
		foreach ($res as $row) {
			$ids[] = $row['category_id'];
		}

		return $this->findBy(['id' => $ids])->order('FIELD(id,' . implode(',', $ids) . ')')->limit(2);
	}

}
