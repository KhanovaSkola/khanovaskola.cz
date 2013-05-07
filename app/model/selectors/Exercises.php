<?php

namespace Selector;

use \Entity\Category;


class Exercises extends \ORM\Table
{

	/**
	 * @param array $columns
	 * @param $query
	 * @return Exercise[]
	 */
	public function findInAny(array $columns, $query)
	{
		$filters = [];
		$args = [];
		foreach ($columns as $col) {
			$filters[] = "$col LIKE ?";
			$args[] = "%$query%";
		}

		$query = $this->getTable()->where(implode(" OR ", $filters), $args);
		return $query;
	}



	/**
	 * @param Category $category
	 * @return Exercise[]
	 */
	public function findByCategory(Category $category)
	{
		$ids = $category->getExerciseIds();
		if (!$ids)
			return $this->findBy(['id' => -1]); // return empty set

		return $this->findBy(['id' => $ids])
			->order('FIELD(id,' . implode(',', $ids) . '), id');
	}



	public function findWithoutCategory()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT DISTINCT exercise_id FROM category_exercise') as $row) {
			$ids[] = (int) $row['exercise_id'];
		}
		return $this->findBy(['id NOT IN ?' => $ids]);
	}



	/**
	 * @return array
	 */
	public function getFill()
	{
		$res = [0 => 'bez cvičení'];
		$res += $this->findAll()->order('label')->fetchPairs('id', 'label');
		return $res;
	}

}
