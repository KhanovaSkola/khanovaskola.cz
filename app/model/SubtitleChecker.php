<?php

namespace Model;

use Entity\Video;
use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\Utils\Json;


class SubtitleChecker extends \Nette\Object
{

	protected $url;

	protected $amara;

	/** @var \Nette\Caching\IStorage */
	protected $cacheStorage;



	public function __construct($url, Amara $amara, IStorage $cacheStorage)
	{
		$this->url = $url;
		$this->amara = $amara;
		$this->cacheStorage = $cacheStorage;
	}



	public function getErrors(Video $video)
	{
		$cache = new Cache($this->cacheStorage, 'subtitle_check');
		if (!isset($cache[$video->id])) {
			$subs = $this->amara->getSubtitles($video);
			$text = '';
			foreach ($subs as $node) {
				$text .= "$node->text\n";
			}

			$data = Json::encode([
				'version' => 1,
				'hash' => md5($text),
				'text' => $text,
			]);
			$c = curl_init($this->url);
			curl_setopt_array($c, [
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $data,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_HTTPHEADER => [
					'Content-Type: application/json',
					'Content-Length: ' . strlen($data),
				],
			]);
			$result = Json::decode(curl_exec($c));
			curl_close($c);

			$cache->save($video->id, $result->errors, [
				\Nette\Caching\Cache::TAGS => ["video/{$video->id}"],
			]);
			return $result->errors;
		}

		return $cache[$video->id];
	}

}
