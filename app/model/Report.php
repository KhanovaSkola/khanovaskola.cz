<?php

namespace Model;

use Entity\Video;
use Nette\Object;
use Sunra\PhpSimple\HtmlDomParser as Html;

/** @deprecated */
class Report extends Object
{

	private $database;

	private $config;



	public function __construct($db, $user, $password)
	{
		$this->config = (object) ['db' => $db, 'user' => $user, 'password' => $password];
	}



	private function getDatabase()
	{
		if ($this->database === NULL) {
			$this->database = new \Nette\Database\Connection("mysql:host=localhost;dbname={$this->config->db}", $this->config->user, $this->config->password);
		}
		return $this->database;
	}



	public function getSubtitles(Video $video)
	{
		$subs = $this->getDatabase()->table('subtitles_full')->select('subs')->where('youtube_id = ? OR youtube_id = ?', $video->youtube_id, $video->youtube_id_original)->fetch()['subs'];
		$subs = json_decode($subs);

		$html = Html::str_get_html($subs);
		if (!$html) {
			return FALSE;
		}
		$data = [];
		foreach ($html->find('body div p') as $row) {
			if (!$row->end)
				continue;
			$data[] = (object) [
				'text' => html_entity_decode($row->innertext),
				'start_time' => $this->normalizeTime($row->begin),
				'end_time' => $this->normalizeTime($row->end),
			];
		}
		return $data;
	}



	private function normalizeTime($time)
	{
		// 00:00:00.464
		list($h, $m, $s) = explode(':', $time);
		return (int) (($h * 3600 + $m * 60 + $s) * 1000);
	}



	public function getLangPk(Video $video)
	{
		return $this->getDatabase()->table('subtitles_full')->select('subLangPk, baseLangPk')->where('youtube_id = ?', $video->youtube_id)->fetch();
	}



	public function getAmaraId(Video $video)
	{
		return $this->getDatabase()->table('map')->select('amara_id')->where('youtube_id = ?', $video->youtube_id)->fetch()['amara_id'];
		// return $this->getDatabase()->table('amara_map')->select('amara_id')->where('youtube_id = ?', $video->youtube_id)->fetch()['amara_id'];
	}



	public function reloadSubtitles(Video $video)
	{
		throw new Nette\NotImplementedException('tohle se vola? Ma se volat amara::purgeDataCache');
		// dump("http://khan-report.khanovaskola.cz/reload_subtitles.php?id={$video->youtube_id}&password=65aw344tsz16254sdF4@-13265");
		// $x = file_get_contents("http://khan-report.khanovaskola.cz/reload_subtitles.php?id={$video->youtube_id}&password=65aw344tsz16254sdF4@-13265");
		// dump($x);
		// die;
	}

}
