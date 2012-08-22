<?php

use Nette\Caching\Cache;


class Videos extends Table
{

	public function updatePositions(array $data)
	{
		$this->connection->beginTransaction();

		$cache = new Cache($this->context->cacheStorage);
		foreach ($data as $position => $id) {
			$this->findOneBy(['id' => $id])->update(['position' => $position]);
			$cache->clean([Cache::TAGS => ["video/$id"]]);
		}

		$video = $this->findOneBy(['id' => $id]);
		$category = $video->getCategory();
		$cache->clean([Cache::TAGS => ["category/$category->id"]]);

		$this->connection->commit();
	}



	/**
	 * @return Selection
	 */
	public function findAll()
	{
		return $this->getTable()->order('position');
	}



	/**
	 * @param array $by
	 * @return Selection
	 */
	public function findBy(array $by)
	{
		return $this->getTable()->where($by)->order('position');
	}



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
	 * @return Selection
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
		return $this->getTable()->select('*')->order('Rand()')->limit(1)->fetch();
	}



	public function findByExercise(Exercise $exercise)
	{
		return $this->findBy(['exercise_id' => $exercise->id]);
	}



	/**
	 * @param array $data
	 * @return \Nette\Database\Table\ActiveRow
	 */
	public function insert($data)
	{
		if (!isset($data['position'])) {
			$last = $this->getTable()->where(['category_id' => $data['category_id']])->order('position DESC')->limit(1)->fetch();
			if ($last) {
				$data['position'] = $last->position + 1;
			} else {
				$data['position'] = 0;
			}
		}

		return $this->getTable()->insert($data);
	}



	public function trimYoutubeIds()
	{
		return $this->connection->exec("UPDATE video SET youtube_id = Trim(youtube_id)");
	}



	public function addDubbedTagToVideos()
	{
		$tag = $this->context->tags->findDubTag();
		if (!$tag) {
			return FALSE;
		}

		$count = 0;
		foreach ($this->findAll() as $video) {
			if ($video->getMetaData()->data->uploader === 'khanacademyczech') {
				$video->addTag($tag->id);
				$count++;
			}
		}

		return $count;
	}

}
