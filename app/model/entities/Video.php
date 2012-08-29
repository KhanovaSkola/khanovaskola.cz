<?php

/**
 * @property int	$category_id
 * @property int	$exercise_id
 * @property string	$label
 * @property string	$slug			Webalized $label
 * @property string	$description
 * @property string	$youtube_id
 * @property int	$position		Unique between siblings
 */
class Video extends Entity
{

	/**
	 * @return Category[]
	 */
	public function getCategories()
	{
		return $this->context->categories->findByVideo($this);
	}



	/**
	 * @return Video
	 */
	public function getNextVideo()
	{
		return $this->getAdjacentVideo(+1);
	}



	/**
	 * @return Video
	 */
	public function getPreviousVideo()
	{
		return $this->getAdjacentVideo(-1);
	}



	/**
	 * @return Video
	 */
	protected function getAdjacentVideo($offset)
	{
        $position = $this->context->database->table('category_video')->where([
            'category_id' => $this->getCategoryIds()[0],
            'video_id' => $this->id,
        ])->fetch()['position'];

        $row = $this->context->database->table('category_video')->where([
            'category_id' => $this->getCategoryIds()[0],
            'position' => $position + $offset,
        ])->fetch();

        if (!$row) {
            return FALSE;
        }
        return $this->context->videos->find($row['video_id']);
	}



	/**
	 * @return Exercise
	 */
	public function getExercise()
	{
		return $this->context->exercises->findOneBy(['id' => $this->exercise_id]);
	}



	/**
	 * Queues Youtube API
	 */
	public function getMetaData()
	{
		$cache = new \Nette\Caching\Cache($this->context->cacheStorage, 'video');
		if (!isset($cache[$this->id])) {
			$res = file_get_contents("http://gdata.youtube.com/feeds/api/videos/$this->youtube_id?v=2&alt=jsonc&prettyprint=false");
			$data = \Nette\Utils\Json::decode($res);
			$cache->save($this->id, $data, [
				\Nette\Caching\Cache::TAGS => ["video/$this->id"],
			]);
		}

		return $cache[$this->id];
	}



	public function getDuration()
	{
		return $this->getMetaData()->data->duration;
	}



	/**
	 * @todo Should this check tags or uploader?
	 * @return bool
	 */
	public function isDubbed()
	{
		return $this->getMetaData()->data->uploader === 'khanacademyczech';
	}



	/**
	 * @return Tag[]
	 */
	public function getTags()
	{
		return $this->context->tags->findByVideo($this);
	}



	/**
	 * @return int[]
	 */
	public function getTagsIds()
	{
		$ids = [];
		foreach ($this->context->database->query('SELECT tag_id FROM tag_video WHERE video_id=?', $this->id) as $row) {
			$ids[] = (int) $row['tag_id'];
		}
		return $ids;
	}


	/**
	 * @param array $tags
	 * @return bool
	 */
	public function updateTags(array $tags)
	{
		if (!count($tags)) {
			return FALSE;
		}

		$values = [];
		foreach ($tags as $tag_id) {
			$values[] = ['video_id' => $this->id, 'tag_id' => $tag_id];
		}

		$db = $this->context->database;
		$db->beginTransaction();
		$db->query('DELETE FROM tag_video WHERE video_id = ?', $this->id);
		$db->query('INSERT INTO tag_video', $values);
		$db->commit();
	}


	/**
	 * @param $tag_id
	 * @return bool
	 * @throws PDOException
	 */
	public function addTag($tag_id)
	{
		try {
			return $this->context->database->query('INSERT INTO tag_video', [
				'tag_id' => $tag_id,
				'video_id' => $this->id,
			]);
		} catch (PDOException $e) {
			if ($e->getCode() == 23000) {
				// duplicate
				return FALSE;
			}
			throw $e;
		}
	}


	/**
	 * @return bool
	 */
	public function hasTags()
	{
		return (bool) count($this->getTagsIds());
	}


	/**
	 * @return string url
	 */
	public function getThumbnail()
	{
		return "http://i.ytimg.com/vi/{$this->youtube_id}/default.jpg";
	}


	/**
	 * @return string url
	 */
	public function getThumbnailHd()
	{
		return "http://i.ytimg.com/vi/{$this->youtube_id}/hqdefault.jpg";
	}



    public function getSubtitles()
    {
        return $this->context->amara->getSubtitles($this);
    }




    /**
     * @return int[]
     */
    public function getCategoryIds()
    {
        $ids = [];
        foreach ($this->context->database->query('SELECT category_id FROM category_video WHERE video_id=?', $this->id) as $row) {
            $ids[] = (int) $row['category_id'];
        }
        return $ids;
    }



    public function getDescription()
    {
        $labels = [];
        $parent = $this->getCategories()->fetch(); // render only one
        while ($parent) {
            $labels[] = $parent->label;
            $parent = $parent->getParent();
        }

        $desc = implode(" ≫ ", $labels) . ": ";

        if ($this->description) {
            return $desc . $this->description;
        }
        return $desc . $this->label;
    }

}
