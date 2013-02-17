<?php

/**
 * @property int	$parent_id
 * @property bool	$is_leaf
 * @property string	$label
 * @property string	$description
 * @property int	$position		Unique between siblings
 * @property string $playlist_en
 */
class Category extends EntityUrl
{

	/**
	 * @return Category[]
	 */
	public function getSubCategories()
	{
		return $this->context->categories->findBy(['parent_id' => $this->id]);
	}



	/**
	 * @param bool $secondHalf Return the other half
	 * @return Category[]
	 */
	public function getSubCategoriesHalf($secondHalf = FALSE)
	{
		$split = ceil($this->getSubCategories()->count() / 2);

		if (!$secondHalf) {
			return $this->getSubCategories()->limit($split);

		} else {
			return $this->getSubCategories()->limit($split, $split);
		}
	}



	/**
	 * Recursive
	 * @return bool
	 */
	public function hasVideos()
	{
		$count = count($this->getVideoIds());
		if ($count) {
			return TRUE;
		}

		foreach ($this->getSubCategories() as $subcat) {
			if ($subcat->hasVideos()) {
				return TRUE;
			}
		}

		return FALSE;
	}



	/**
	 * @return Video[]
	 */
	public function getVideos()
	{
		return $this->context->videos->findByCategory($this);
	}



	/**
	 * @return Video[]
	 */
	public function getVideosHalf($secondHalf = FALSE)
	{
		$count = $this->getVideos()->count();
		if ($count > 10) {
			$split = ceil($count / 2);
		} else {
			$split = 999; // only one column if more than ten videos
		}

		if (!$secondHalf) {
			return $this->getVideos()->limit($split);

		} else {
			return $this->getVideos()->limit($split, $split);
		}
	}



	/**
	 * @return Category
	 */
	public function getParent()
	{
		return $this->context->categories->find($this->parent_id);
	}



	/**
	 * @return bool
	 */
	public function isSubject()
	{
		return $this->parent_id === NULL;
	}



	/**
	 * @return bool
	 */
	public function isLeaf()
	{
		return $this->is_leaf == 1;
	}



	/**
	 * @return bool
	 */
	public function isSubcategory()
	{
		return !$this->isSubject() && !$this->isLeaf();
	}



	/**
	 * @return int seconds
	 */
	public function getDuration()
	{
		$cache = new \Nette\Caching\Cache($this->context->cacheStorage, 'category_duration');
		if (!isset($cache[$this->id])) {
			$duration = 0;
			if ($this->isLeaf()) {
				foreach ($this->getVideos() as $video) {
					$duration += $video->duration;
				}
			} else {
				foreach ($this->getSubCategories() as $subcat) {
					$duration += $subcat->getDuration();
				}
			}

			$cache->save($this->id, $duration, [
				\Nette\Caching\Cache::TAGS => ["categories", "category/$this->id"],
			]);
		}

		return $cache[$this->id];
	}


	/**
	 * @return string
	 */
	public function getDescription()
	{
		$desc = '';

		$bread = [];
		$parent = $this;
		while ($parent) {
			$bread[] = $parent->label;
			$parent = $parent->getParent();
		}
		if (count($bread)) {
			$bread = array_reverse($bread);
			$desc .= implode(" ≫ ", $bread);
		}

		if ($this->description) {
			$desc .= ". {$this->description}";
		}

		if (strlen($desc) > 120) {
			return $desc;
		}

		if ($this->isLeaf()) {
			$videos = [];
			foreach ($this->getVideos() as $video) {
				$videos[] = $video->label;
			}
			if (count($videos)) {
				$desc .= ": " . implode(", ", $videos);
			}

		} else {
			$subcats = [];
			foreach ($this->getSubCategories() as $subcat) {
				$subcats[] = $subcat->label;
			}
			if (count($subcats)) {
				$desc .= ": " . implode(", ", $subcats);
			}
		}

		return trim($desc);
	}



	/**
	 * Ordered by position
	 * @return int[]
	 */
	public function getVideoIds()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT video_id FROM category_video WHERE category_id=? ORDER BY position ASC', $this->id) as $row) {
			$ids[] = (int) $row['video_id'];
		}
		return $ids;
	}



	public function containsVideo(Video $video)
	{
		foreach ($this->getVideoIds() as $id) {
			if ($id === $video->id) {
				return TRUE;
			}
		}

		return FALSE;
	}



	/**
	 * Ordered by position
	 * @return int[]
	 */
	public function getExerciseIds()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT exercise_id FROM category_exercise WHERE category_id=? ORDER BY position ASC', $this->id) as $row) {
			$ids[] = (int) $row['exercise_id'];
		}
		return $ids;
	}



	/**
	 * Recursive
	 * @return bool
	 */
	public function hasExercises()
	{
		$count = count($this->getExerciseIds());
		if ($count) {
			return TRUE;
		}

		foreach ($this->getSubCategories() as $subcat) {
			if ($subcat->hasExercises()) {
				return TRUE;
			}
		}

		return FALSE;
	}



	/**
	 * @return Exercise[]
	 */
	public function getExercises()
	{
		return $this->context->exercises->findByCategory($this);
	}



	public function addVideo(Video $video)
	{
		$position = 1;
		foreach ($this->context->database->query('SELECT position FROM category_video WHERE category_id=? ORDER BY position DESC', $this->id) as $row) {
			$position = $row['position'];
			break;
		}
		$this->context->database->query('INSERT INTO category_video (category_id, video_id, position) VALUES (?, ?, ?)', $this->id, $video->id, $position + 1);
	}



	public function updatePositions(array $data)
	{
		$db = $this->context->database;
		$db->beginTransaction();
		$position = 1;
		foreach ($data as $vid) {
			$db->query('UPDATE category_video SET position=? WHERE category_id=? AND video_id=?', $position, $this->id, $vid);
			$position++;
		}
		$db->commit();

		// invalidate cache
	}



	public function addMapRelation(Category $child)
	{
		if  ($child->id === $this->id) {
			return FALSE;
		}

		try {
			$this->context->database->query('INSERT INTO map (parent_id, child_id) VALUES (?, ?)', $this->id, $child->id);
		} catch (\PDOException $e) {
			if ($e->getCode() != 23000) {
				throw $e;
			}
			// relation already set
		}
	}



	public function getMapChildren()
	{
		$children = [];
		foreach ($this->context->database->query('SELECT child_id FROM map WHERE parent_id=?', $this->id) as $row) {
			$children[] = $this->context->categories->find($row['child_id']);
		}

		return $children;
	}



	public function getMapDepth()
	{
		$depth = 0;
		$cid = $this->id;
		while (TRUE) {
			$res = $this->context->database->query('SELECT parent_id FROM map WHERE child_id=?', $cid)->fetch();
			if (!$res) {
				return $depth;
			}
			$cid = $res['parent_id'];
			$depth++;
		}
	}



	public function hasUserVotedFor(User $user)
	{
		$res = $this->context->database->query('SELECT Count(*) as `count`
			FROM `want_translated` WHERE `category_id`=? and `user_id`=?', $this->id, $user->id)->fetch();
		return $res['count'] !== 0;
	}



	public function getTranslationVoteCount()
	{
		$res = $this->context->database->query('SELECT Count(*) as `count`
			FROM `want_translated` WHERE `category_id`=?', $this->id)->fetch();
		return $res['count'];
	}



	public function addVote(User $user)
	{
		return $this->context->database->query('INSERT INTO `want_translated`
			(category_id, user_id) VALUES (?, ?)', $this->id, $user->id);
	}



	public function removeVote(User $user)
	{
		return $this->context->database->query('DELETE FROM `want_translated` WHERE `category_id`=? AND `user_id`=?', $this->id, $user->id);
	}



	public function getTranslateUrl()
	{
		if (!$this->isLeaf() || $this->playlist_en === "")
			return FALSE;

		return 'http://khan-report.appspot.com/translations/subtitleactions?playlist=' . urlencode($this->playlist_en) . '&language=Czech';
	}



	public function getAuthors()
	{
		$author_ids = [];
		foreach ($this->getVideos() as $video) {
			if ($video->author_id) {
				if (!isset($author_ids[$video->author_id]))
					$author_ids[$video->author_id] = 0;
				$author_ids[$video->author_id]++;
			}
		}
		if (!count($author_ids)) {
			return NULL;
		}
		arsort($author_ids);
		
		return $this->context->authors->findBy(['id' => array_keys($author_ids)]);
	}

}
