<?php

use Nette\Utils\Json;


class Amara extends Nette\Object
{

    const ENDPOINT = 'http://www.universalsubtitles.org';



    /** @var string */
    protected $key;

    /** @var string */
    protected $username;

    /** @var \Nette\Caching\IStorage */
    protected $cacheStorage;



    public function __construct($key, $username, \Nette\Caching\IStorage $cacheStorage)
    {
        $this->key = $key;
        $this->username = $username;
        $this->cacheStorage = $cacheStorage;
    }



    public function getVideoMeta(Video $video)
    {
        $url = "http://www.youtube.com/watch?v={$video->youtube_id}";
        return $this->parseRequest(self::ENDPOINT . "/api2/partners/videos/?video_url=" . urlencode($url));
    }



    public function getSubtitles(Video $video)
    {
        $cache = new \Nette\Caching\Cache($this->cacheStorage, 'subtitles');
        if (!isset($cache[$video->id])) {
            $meta = $this->getVideoMeta($video);
            if (!count($meta->objects)) {
                return FALSE;
            }

            $id = $meta->objects[0]->id;
            $content = $this->makeRequest(self::ENDPOINT . "/api2/partners/videos/$id/languages/cs/subtitles/?format=srt");
            $res = SrtParser::parse($content);
            $cache->save($video->id, $res);
        }

        return $cache[$video->id];
    }



    protected function parseRequest($target)
    {
        return Json::decode($this->makeRequest($target));
    }



    protected function makeRequest($target)
    {
        $c = curl_init();
        curl_setopt_array($c, [
            CURLOPT_URL => $target,
            CURLOPT_HTTPHEADER => [
                "X-api-username: {$this->username}",
                "X-apikey: {$this->key}",
                "Accept: application/json",
            ],
            CURLOPT_FOLLOWLOCATION => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_SSL_VERIFYHOST => FALSE,
        ]);
        $res = curl_exec($c);
        curl_close($c);

        return $res;
    }

}
