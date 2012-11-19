<?php

use Nette\Utils\Json;


class Amara extends Nette\Object
{

	const ENDPOINT = 'http://www.universalsubtitles.org';



	/** @var \Nette\Caching\IStorage */
	protected $cacheStorage;



	public function __construct(\Nette\Caching\IStorage $cacheStorage)
	{
		$this->cacheStorage = $cacheStorage;
	}



	public function getSubtitles(Video $video)
	{
		$cache = new \Nette\Caching\Cache($this->cacheStorage, 'subtitles');
		if (!isset($cache[$video->id])) {
			$url = self::ENDPOINT . '/widget/rpc/jsonp/show_widget?video_url=' . urlencode("\"http://www.youtube.com/watch?v={$video->youtube_id}\"") . '&is_remote=true&base_state=%7B%22language%22%3A%22cs%22%7D&callback=';
			$res = file_get_contents($url);
			$data = \Nette\Utils\Json::decode(substr($res, 1, -2));
			
			if ($data->subtitles !== NULL) {
				$cache->save($video->id, $data->subtitles->subtitles);
				return $data->subtitles->subtitles;

			} else {
				return [];
			}
		}

		return $cache[$video->id];
	}

}
