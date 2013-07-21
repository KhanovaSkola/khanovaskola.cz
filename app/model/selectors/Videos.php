<?php

namespace Selector;

use Entity\Tag;
use Entity\Exercise;
use Entity\Category;
use Nette\Caching\Cache;


class Videos extends \ORM\Table
{

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



	public function findAllDubbed()
	{
		return $this->findByTag($this->context->tags->findDubTag());
	}



	/**
	 * @param Tag $tag
	 * @return Video[]
	 */
	public function findByTag(Tag $tag)
	{
		$ids = $tag->getVideosIds();
		if (!count($ids)) {
			// return empty result, we can't have empty FIELD() in mysql
			return $this->findBy([
				'id' => $ids
			]);
		}

		return $this->findBy([
			'id' => $ids,
		])->order('FIELD(id,' . implode(',', $tag->getOrderedVideosIds()) . '), id');
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



	public function findRandomDubbed()
	{
		$tag = $this->context->tags->findDubTag();
		return $this->findBy(['id' => $tag->getVideosIds()])->order('Rand()')->limit(1)->fetch();
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
				'id' => $ids
			]);
		}

		return $this->findBy([
			'id' => $ids,
		])->order('FIELD(id,' . implode(',', $ids) . '), id');
	}



	/**
	 * @return array
	 */
	public function getFill()
	{
		return $this->findAll()->order('label')->fetchPairs('id', 'label');
	}



	public function findNotVerified()
	{
		return $this->findBy(['id NOT IN (SELECT video_id FROM video_verification)']);
	}



	public function findWithVerification($count = 1)
	{
		$order = $this->context->database->table('video_verification')->select('video_id')->order('timestamp DESC')->fetchPairs('video_id', 'video_id');
		$order = implode(',', $order);
		return $this->findBy(['id IN (SELECT video_id FROM video_verification GROUP BY video_id HAVING Count(*) = ?)' => $count])
			->order("FIELD(id, $order)");
	}



	public function findReadyForDubbing()
	{
		return $this->findWithVerification(2)->where('id NOT IN (SELECT video_id FROM tag_video WHERE tag_id=?)', $this->context->tags->findDubTag()->id);
	}



	public function slugExistsForLabel($label)
	{
		$slug = \Nette\Utils\Strings::webalize($label);
		return $this->findBySlug($slug);
	}

}
