<?php

use Nette\Caching\Cache;


class Videos extends Table
{

	public function updatePositions(array $data)
	{
		throw new \Nette\NotImplementedException;
	}



	/**
	 * @param array $by
	 * @return Video[]
	 */
	public function findBy(array $by)
	{
		return $this->getTable()->where($by);
	}


	/**
	 * @param array $columns
	 * @param $query
	 * @return Video[]
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
	 * @param Tag $tag
	 * @return Video[]
	 */
	public function findByTag(Tag $tag)
	{
		return $this->getTable()->where('id', $tag->getVideosIds());
	}



	/**
	 * @return Video
	 */
	public function findRandom()
	{
		$video = $this->getTable()->select('*')->order('Rand()')->limit(1)->fetch();
		if (count($video->getCategoryIds()) <= 0) {
			return $this->findRandom();
		}
		return $video;
	}


	/**
	 * @param Exercise $exercise
	 * @return Video[]
	 */
	public function findByExercise(Exercise $exercise)
	{
		return $this->findBy(['exercise_id' => $exercise->id]);
	}



	public function trimYoutubeIds()
	{
		// trim and inclusive remove everything after hashes, then crop it to 11 chars
		return $this->connection->exec("UPDATE video SET youtube_id = Substring(Substring_index(Trim(youtube_id), '#', 1), 1, 11)");
	}



	public function addDubbedTagToVideos()
	{
		$tag = $this->context->tags->findDubTag();
		if (!$tag) {
			return FALSE;
		}

		$count = 0;
		foreach ($this->findAll() as $video) {
			if ($video->isDubbed()) {
				$video->addTag($tag->id);
				$count++;
			}
		}

		return $count;
	}


	/**
	 * @return Video
	 */
	public function findEmpty()
	{
		return $this->findOneBy([
			'label' => '',
			'description' => '',
		]);
	}


	/**
	 * @param Category $category
	 * @return Video[]
	 */
	public function findByCategory(Category $category)
	{
		$ids = $category->getVideoIds();
		if (!count($ids)) { // TODO: remove and handle differently (ie do not show empty categories)
			return $this->findBy([
				'id' => $ids,
				'slug <> ?' => '', // not empty videos
			]);
		}

		return $this->findBy([
			'id' => $ids,
			'slug <> ?' => '', // not empty videos
		])->order('FIELD(id,' . implode(',', $ids) . '), id');
	}

}
