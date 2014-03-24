<?php

namespace Model;

use Nette\Object;
use Nette\Utils\Json;
use Entity\User;


class Wiki extends Object
{

	private $secret;

	public function __construct($secret)
	{
		$this->secret = $secret;
	}

	public function getSignature($payload)
	{
		return hash_hmac("sha256", $payload, $this->secret);
	}

	protected function getArgs($payload)
	{
		$query = [];
		parse_str(base64_decode($payload), $query);
		return $query;
	}

	public function getLoginUrl($payload, User $user)
	{
		$args = $this->getArgs($payload);
		$params = [
			'nonce' => $args['nonce'],
			'email' => $user->mail,
			'external_id' => $user->id,
			'name' => $user->name,
			'grps' => $user->role,
			'backlink' => $args['backlink'],
		];

		$response = base64_encode(http_build_query($params));
		$url = $args['target'] . (strpos($args['target'], '?') === FALSE ? '?' : '&');
		return $url . http_build_query([
			'sso' => $response,
			'sig' => $this->getSignature($response),
			'u' => $user->mail, // trigger dokuwiki auth
			'p' => 1,
			'r' => 1,
		]);
	}

	public function getPage($page)
	{
		$opts = [
			'http' => [
				'method' => 'GET',
				'header' => 'X-DokuWiki-Do: export_xhtml'
			]
		];
		return file_get_contents("https://wiki.khanovaskola.cz/doku.php?id=$page", false, stream_context_create($opts));
	}

}
