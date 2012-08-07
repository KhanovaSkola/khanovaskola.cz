<?php

/**
 * @property int	$parent_id
 * @property bool	$is_leaf
 * @property string	$label
 * @property string	$slug			Webalized $label
 * @property strign	$description
 * @proeprty int	$position		Unique between siblings
 */
class Category extends Entity
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
		$count = $this->getVideos()->count();
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
		return $this->context->videos->findBy(['category_id' => $this->id]);
	}



	/**
	 * @return Category
	 */
	public function getParent()
	{
		return $this->context->categories->findOneBy(['id' => $this->parent_id]);
	}



	/** @return bool */
	public function isSubject()
	{
		return $this->parent_id === NULL;
	}



	/** @return bool */
	public function isLeaf()
	{
		return $this->is_leaf == 1;
	}



	/** @return bool */
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
					$duration += $video->getDuration();
				}
			} else {
				foreach ($this->getSubCategories() as $subcat) {
					$duration += $subcat->getDuration();
				}
			}

			$cache->save($this->id, $duration, [
				\Nette\Caching\Cache::TAGS => ["category/$this->id"],
			]);
		}

		return $cache[$this->id];
	}

}
