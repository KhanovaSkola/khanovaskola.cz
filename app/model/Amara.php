<?php

namespace Model;

use Entity\Video;
use Nette\Object;
use Nette\Utils\Json;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Sunra\PhpSimple\HtmlDomParser as Html;


class Amara extends Object
{

	/** @var \Nette\Caching\IStorage */
	protected $cacheStorage;



	public function __construct(IStorage $cacheStorage)
	{
		$this->cacheStorage = $cacheStorage;
	}


	/** @deprecated */
	public function getSubtitles(Video $video)
	{
		try {
			$data = $this->getData($video);
			if ($data->subtitles !== NULL) {
				$subs = $data->subtitles->subtitles;
				if (is_array($subs))
					return $subs;

				$html = Html::str_get_html($subs);
				$data = [];
				foreach ($html->find('body div p') as $row) {
					if (!$row->end)
						continue;
					$text = html_entity_decode($row->innertext);
					$text = str_replace('<br/>', ' ', $text);
					$data[] = (object) [
						'text' => $text,
						'start_time' => $this->normalizeTime($row->begin),
						'end_time' => $this->normalizeTime($row->end),
					];
				}
				// dump($data);
				return $data;
			}
		} catch (\Nette\Utils\JsonException $e) {
			return FALSE;
		}

		return [];
	}



	private function normalizeTime($time)
	{
		// 00:00:00.464
		list($h, $m, $s) = explode(':', $time);
		return (int) (($h * 3600 + $m * 60 + $s) * 1000);
	}



	public function clearCache(Video $video)
	{
		$cache = new Cache($this->cacheStorage);
		$cache->remove("amara/$video->id");
	}



	/**
	 * @throws \Nette\Utils\JsonException
	 */
	public function getId(Video $video)
	{
		return $this->getData($video)->video_id;
	}



	public function getLanguagePk(Video $video)
	{
		$langs = $this->getData($video)->drop_down_contents;
		foreach ($langs as $node) {
			if ($node->language === 'cs') {
				if (property_exists($node, 'standard_pk')) {
					return [$node->standard_pk, $node->pk];
				}

				return ['null', $node->pk];
			}
		}

		if (isset($langs[0])) {
			return ['null', $langs[0]->pk];

		} else {
			return ['null', 'english'];
		}
	}



	/**
	 * @throws \Nette\Utils\JsonException
	 */
	protected function getData(Video $video)
	{
		$cache = new Cache($this->cacheStorage);
		if (!isset($cache["amara/$video->id"])) {
			// $url = 'https://www.amara.org/widget/rpc/jsonp/fetch_subtitles?video_id="' . $video->getAmaraId() .  '"&language_pk=595607';
			$url = 'https://www.amara.org/widget/rpc/jsonp/show_widget?video_url=%22http%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3D' . $video->youtube_id . '%22&is_remote=true&base_state=%7B%22language%22%3A%22cs%22%7D&callback=';
			// echo $url;
			$res = file_get_contents($url);
			$data = Json::decode(substr($res, strlen('('), -2)); // throws catched exception
			// dump($data);die;
			$cache->save("amara/$video->id", $data, [
				Cache::TAGS => ["video/$video->id"],
			]);
			return $data;
		}

		return $cache["amara/$video->id"];
	}



	public function purgeDataCache(Video $video)
	{
		$cache = new Cache($this->cacheStorage);
		$cache->remove("amara/$video->id");
	}

}
