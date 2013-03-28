<?php

namespace Model;

use Nette\Object;
use Nette\Utils\Json;


class MailChimp extends Object
{

	const ENDPOINT = '.api.mailchimp.com/1.3/';



	protected $key;
	protected $server;



	public function __construct($key)
	{
		$this->key = $key;
		list($tmp, $this->server) = explode('-', $key);
	}



	/**
	 * @see http://apidocs.mailchimp.com/api/1.3/listbatchsubscribe.func.php
	 */
	public function subscribeEmail($list_id, $email)
	{
		$base = 'http://' . $this->server . self::ENDPOINT . '?';
		$url = $base . http_build_query([
			'output' => 'json',
			'method' => 'listBatchSubscribe',
			'apikey' => $this->key,
			'id' => $list_id,
			'batch' => [[
				'EMAIL' => $email,
				'EMAIL_TYPE' => 'html',
			]],
			'double_optin' => TRUE,
			//'update_existing' => FALSE,
			//'replace_interests' => TRUE,
		]);
		$res = file_get_contents($url);

		$data = Json::decode($res);
		if ($data->error_count) {
			return FALSE;
		}
		return TRUE;
	}

}
