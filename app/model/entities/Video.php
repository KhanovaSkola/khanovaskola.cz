<?php

namespace Entity;

use Nette\Caching\Cache;


/**
 * @property int	$category_id
 * @property int	$exercise_id
 * @property string	$label
 * @property string	$description
 * @property string	$youtube_id
 * @property int	$duration		seconds
 * @property string	$uploader		youtube username
 * @property int	$author_id
 * @property string $external_exercise_url
 */
class Video extends \ORM\EntityUrl
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
	public function getNextVideo(Category $category)
	{
		return $this->getAdjacentVideo($category, +1);
	}



	/**
	 * @return Video
	 */
	public function getPreviousVideo(Category $category)
	{
		return $this->getAdjacentVideo($category, -1);
	}



	/**
	 * @return Video
	 */
	protected function getAdjacentVideo(Category $category, $offset)
	{
		$position = $this->context->database->table('category_video')->where([
			'category_id' => $category->id,
			'video_id' => $this->id,
		])->fetch()['position'];

		$where = ['category_id' => $category->id];
		if ($offset > 0) {
			$where['position >= ?'] = $position + $offset;
			$order = 'position ASC';
		} else {
			$where['position <= ?'] = $position + $offset;
			$order = 'position DESC';
		}

		$row = $this->context->database->table('category_video')->where($where)->order($order)->limit(1)->fetch();

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
		return $this->context->exercises->find($this->exercise_id);
	}



	/**
	 * Queues Youtube API
	 * @throws \Nette\Utils\JsonException
	 */
	public function getMetaData()
	{
		$cache = new Cache($this->context->cacheStorage);
		if (!isset($cache["video/$this->id"])) {
			$res = file_get_contents("http://gdata.youtube.com/feeds/api/videos/$this->youtube_id?v=2&alt=jsonc&prettyprint=false");
			$data = \Nette\Utils\Json::decode($res);
			if (property_exists($data, 'error')) {
				throw new \Nette\Utils\JsonException($data->error[0]->code);
			}
			$cache->save("video/$this->id", $data, [
				\Nette\Caching\Cache::TAGS => ["video/$this->id"],
			]);

			return $data;
		}

		return $cache["video/$this->id"];
	}



	/**
	 * Queries 3rd party server for metadata
	 * Does not update the db record
	 */
	public function updateMetaData()
	{
		try {
			$meta = $this->getMetaData();
		} catch (\Nette\Utils\JsonException $e) {
			return FALSE;
		}

		$this->duration = $meta->data->duration;
		$this->uploader = $meta->data->uploader;

		// add dubbed tag if applies
		$tag = $this->context->tags->findDubTag();
		if ($this->isDubbed()) {
			$this->addTag($tag->id);
		}

		return TRUE;
	}



	/**
	 * @return bool
	 */
	public function isDubbed()
	{
		return $this->uploader == 'khanacademyczech';
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
		$db->query('DELETE FROM tag_video WHERE video_id = ? AND tag_id != ?', $this->id, $this->context->tags->findDubTag()->id);
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
		} catch (\PDOException $e) {
			if ($e->getCode() == 23000) {
				// duplicate
				return FALSE;
			}
			throw $e;
		}
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
			$position = $db->query('SELECT position FROM category_video WHERE category_id=? ORDER BY position DESC', $cid)->fetch()['position'];
			$insert[] = ['video_id' => $this->id, 'category_id' => $cid, 'position' => $position + 1];
		}

		$db->beginTransaction();
		foreach (array_diff($this->getCategoryIds(), $cats) as $cid) {
			$db->query('DELETE FROM category_video WHERE video_id=? AND category_id=?', $this->id, $cid);
		}
		if (count($insert)) {
			$db->query('INSERT INTO category_video', $insert);
		}
		$db->commit();
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



	public function getDescription(Category $category)
	{
		$labels = [];
		$parent = $category;
		while ($parent) {
			$labels[] = $parent->label;
			$parent = $parent->getParent();
		}
		$labels = array_reverse($labels);

		$desc = implode(" ≫ ", $labels) . ": ";

		if ($this->description) {
			return $desc . $this->description;

		} else if ($subs = $this->getSubtitles()) {
			return FALSE; // let search engine select best part of subtitles
		}

		return $desc . $this->label;
	}


	/**
	 * @return int
	 */
	public function getOneCategoryId()
	{
		return $this->getCategoryIds()[0];
	}



	/**
	 * Default to this category when linking from exercises etc.
	 * @return Category
	 */
	public function getOneCategory()
	{
		return $this->context->categories->find($this->getOneCategoryId());
	}



	public function hasAuthor()
	{
		return $this->author_id !== NULL;
	}



	public function getAuthor()
	{
		if (!$this->author_id)
			return NULL;

		return $this->context->authors->find($this->author_id);
	}



	public function getVerifications()
	{
		$rows = [];
		foreach ($this->context->database->query('SELECT user_id, timestamp FROM video_verification WHERE video_id=? ORDER BY timestamp DESC', $this->id) as $row) {
			$rows[] = (object) [
				'user' => $this->context->users->find($row['user_id']),
				'timestamp' => $row['timestamp'],
			];
		}
		return $rows;
	}



	public function verify($user)
	{
		return $this->context->database->query('INSERT INTO video_verification (video_id, user_id) VALUES (?, ?)', $this->id, $user->id);
	}



	public function undoVerify($user)
	{
		return $this->context->database->query('DELETE FROM video_verification WHERE video_id=? AND user_id=?', $this->id, $user->id);
	}



	public function hasUserVerified($user)
	{
		return $this->context->database->query('SELECT Count(*) as `count` FROM video_verification WHERE video_id=? AND user_id=?', $this->id, $user->id)->fetch()['count'] !== 0;
	}



	/**
	 * @return string[]
	 */
	public function getAdSlugs()
	{
		$slugs = [];
		foreach ($this->context->database->query('SELECT slug FROM url WHERE type=? AND entity_id=? ORDER BY timestamp DESC', 'video_ad', $this->id) as $row) {
			$slugs[] = $row['slug'];
		}
		return $slugs;
	}



	public function getAdSlug()
	{
		$slugs = $this->getAdSlugs();
		if ($slugs)
			return $slugs[0];
		return NULL;
	}



	public function addAlias($alias)
	{
		$slug = \Nette\Utils\Strings::webalize($alias);
		try {
			$this->context->database->query('INSERT INTO url (type, entity_id, slug) VALUES (?, ?, ?)', 'video_ad', $this->id, $slug);

		} catch (\PDOException $e) {
			if ($e->getCode() != 23000) {
				throw $e;
			}
			// this row already exists
			return FALSE;
		}

		return TRUE;
	}

}
