<?php

namespace Model;

use Nette\Object;
use Nette\Utils\Json;
use Entity\User;


class Discourse extends Object
{

	private $secret;
	private $redirect;

	public function __construct($secret, $redirect)
	{
		$this->secret = $secret;
		$this->redirect = $redirect;
	}

	public function getSignature($payload)
	{
		return hash_hmac("sha256", $payload, $this->secret);
	}

	protected function getNonce($payload)
	{
		$query = [];
		parse_str(base64_decode($payload), $query);
		return $query['nonce'];
	}

	public function getLoginUrl($payload, User $user)
	{
		$params = [
			'nonce' => $this->getNonce($payload),
			'email' => $user->mail,
			'external_id' => $user->id,
			'name' => $user->name,
		];

		$response = base64_encode(http_build_query($params));
		$url = rtrim($this->redirect, '?') . '?';
		return $url . http_build_query([
			'sso' => $response,
			'sig' => $this->getSignature($response)
		]);
	}

}
