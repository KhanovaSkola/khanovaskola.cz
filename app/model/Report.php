<?php

namespace Model;

use Entity\Video;
use Nette\Object;


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
		$json = $this->getDatabase()->table('subtitles_full')->select('subs')->where('youtube_id = ?', $video->youtube_id)->fetch()['subs'];
		return json_decode($json);
	}



	public function getAmaraId(Video $video)
	{
		return $this->getDatabase()->table('amara_map')->select('amara_id')->where('youtube_id = ?', $video->youtube_id)->fetch()['amara_id'];
	}



	public function reloadSubtitles(Video $video)
	{
		return file_get_contents("http://khan-report.khanovaskola.cz/reload_subtitles.php?id={$video->youtube_id}&password=65aw344tsz16254sdF4@-13265");
	}

}
