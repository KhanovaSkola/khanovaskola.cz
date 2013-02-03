<?php

abstract class EntityUrl extends Entity
{

	/**
	 * @return string[]
	 */
	public function getSlugs()
	{
		$slugs = [];
		foreach ($this->context->database->query('SELECT slug FROM url WHERE type=? AND entity_id=? ORDER BY timestamp DESC', get_class($this), $this->id) as $row) {
			$slugs[] = $row['slug'];
		}
		return $slugs;
	}



	/**
	 * Most recent slug
	 * @return string
	 */
	public function getSlug()
	{
		$slugs = $this->getSlugs();
		if (isset($slugs[0])) {
			return $slugs[0];
		}

		return NULL;
	}



	public function addSlug($name)
	{
		$slug = \Nette\Utils\Strings::webalize($name);
		try {
			$this->context->database->query('INSERT INTO url (type, entity_id, slug) VALUES (?, ?, ?)', get_class($this), $this->id, $slug);

		} catch (PDOException $e) {
			if ($e->getCode() != 23000) {
				throw $e;
			}
			// this happens when settign name back to a previous one -> update timestmap on that row, do not create another row
			$this->context->database->query('UPDATE url SET timestamp=Now() WHERE type=? AND entity_id=? AND slug=?', get_class($this), $this->id, $slug);
		}
	}

}
