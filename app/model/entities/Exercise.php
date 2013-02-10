<?php

/**
 * @property string	$label
 * @property string	$file
 */
class Exercise extends EntityUrl
{

	const STARTED = 'started';
	const STRUGGLING = 'struggling';
	const REVIEW = 'review';
	const PROFICIENT = 'proficient';


	/**
	 * @return Category[]
	 */
	public function getCategories()
	{
		return $this->context->categories->findByExercise($this);
	}



	/**
	 * @return Video[]
	 */
	public function getRelatedVideos()
	{
		return $this->context->videos->findByExercise($this);
	}


	/**
	 * @return string
	 */
	public function getDescription()
	{
		if ($this->getRelatedVideos()->count()) {
			$desc = [];
			$labels = [];
			foreach ($this->getRelatedVideos() as $video) {
				if ($video->description) {
					$desc[] = $video->description;
				}
				$labels[] = $video->label;
			}

			$ret = '';
			if (count($desc)) {
				$ret = implode(' ', $desc);
			} else {
				$ret = "Cvičení {$this->label} pro lekc" . (count($labels) > 1 ? 'e ' : 'i ') . implode(', ', $labels);
			}

			if (isset($video)) { // last from iterator
				foreach ($video->getCategories() as $category) {
					$parent = $category;
					break;
				}
				$cats = [];
				while ($parent) {
					$cats[] = $parent->label;
					$parent = $parent->getParent();
				}
				$cats = array_reverse($cats);

				$ret = implode(" ≫ ", $cats) . ": $ret.";
			}

			return $ret;
		}

		return "Cvičení {$this->label} na Khanově škole.";
	}



	/**
	 * @return int[]
	 */
	public function getCategoryIds()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT category_id FROM category_exercise WHERE exercise_id=?', $this->id) as $row) {
			$ids[] = (int) $row['category_id'];
		}
		return $ids;
	}



	/**
	 * @param array $cats
	 * @return bool
	 */
	public function updateCategories(array $cats)
	{
		if (!count($cats)) {
			return FALSE;
		}
		$db = $this->context->database;

		$insert = [];
		foreach (array_diff($cats, $this->getCategoryIds()) as $cid) {
			$position = $db->query('SELECT position FROM category_exercise WHERE category_id=? ORDER BY position DESC', $cid)->fetch()['position'];
			$insert[] = ['exercise_id' => $this->id, 'category_id' => $cid, 'position' => $position + 1];
		}

		$db->beginTransaction();
		foreach (array_diff($this->getCategoryIds(), $cats) as $cid) {
			$db->query('DELETE FROM category_exercise WHERE exercise_id=? AND category_id=?', $this->id, $cid);
		}
		if (count($insert)) {
			$db->query('INSERT INTO category_exercise', $insert);
		}
		$db->commit();
	}

}
