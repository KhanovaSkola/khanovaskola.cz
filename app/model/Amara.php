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
		$data = $this->getData($video);
		if ($data->subtitles !== NULL) {
			return $data->subtitles->subtitles;
		}

		return [];
	}



	public function getId(Video $video)
	{
		return $this->getData($video)->video_id;
	}



	public function getLanguagePk(Video $video)
	{
		$langs = $this->getData($video)->drop_down_contents;
		foreach ($langs as $node) {
			if ($node->language === 'cs') {
				return [$node->standard_pk, $node->pk];
			}
		}
		return ['null', $langs[0]->pk];
	}



	protected function getData(Video $video)
	{
		$cache = new \Nette\Caching\Cache($this->cacheStorage, 'amara');
		if (!isset($cache[$video->id])) {
			$url = self::ENDPOINT . '/widget/rpc/jsonp/show_widget?video_url=' . urlencode("\"http://www.youtube.com/watch?v={$video->youtube_id}\"") . '&is_remote=true&base_state=%7B%22language%22%3A%22cs%22%7D&callback=';
			$res = file_get_contents($url);
			$data = \Nette\Utils\Json::decode(substr($res, 1, -2));
			
			$cache->save($video->id, $data);
			return $data;
		}

		return $cache[$video->id];
	}

}
