<?php

namespace ApiModule;


class BaseApiPresenter extends \BasePresenter
{

	const OK = 200;
	const CREATED = 201;

	const INVALID = 400;
	const UNAUTHORIZED = 401;
	const NOT_ALLOWED = 405;



	public function startup()
	{
		parent::startup();

		$id = (int) $this->getParam('id');

		$word = $this->getHttpRequest()->getMethod();
		$method = $this->getParam('method');
		$call = strToLower($word) . ucFirst($method);

		try {
			$this->reflection->getMethod($call);

		} catch (\ReflectionException $e) {
			$this->sendError(['error' => "Method does not exist", "requested" => $call]);
		}

		$this->{$call}($id);
	}



	protected function sendSuccess($data, $code = self::OK)
	{
		$this->getHttpResponse()->setCode($code);
		$data['status'] = 'success';
		$this->sendJson($data, $code);
	}



	protected function sendError($data, $code = self::INVALID)
	{
		$this->getHttpResponse()->setCode($code);
		$data['status'] = 'failed';
		$this->sendJson($data);
	}

}