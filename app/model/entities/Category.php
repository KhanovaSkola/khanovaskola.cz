<?php

class Category extends Entity
{
	
	public function getSubCategories()
	{
		return $this->context->categories->findBy(['parent_id' => $this->id]);
	}
	
	
	
	public function getSubCategoriesHalf($secondHalf = FALSE)
	{
		$split = ceil($this->getSubCategories()->count() / 2);
		if (!$secondHalf) {
			return $this->getSubCategories()->limit($split);
		} else {
			return $this->getSubCategories()->limit($split, $split);
		}
	}
	
	
	
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
	
	
	
	public function getVideos()
	{
		return $this->context->videos->findBy(['category_id' => $this->id]);
	}
	
	
	
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
	
	
	
	public function getDuration()
	{
		$cache = new \Nette\Caching\Cache($this->context->cacheStorage, 'category_duration');
		if (!isset($cache[$this->id])) {
			$duration = 0;
			foreach ($this->getVideos() as $video) {
				$duration += $video->getDuration();
			}

			$cache->save($this->id, $duration, [
				\Nette\Caching\Cache::EXPIRE => '+ 6 hours',
			]);
		}
		
		return $cache[$this->id];
	}
	
}
