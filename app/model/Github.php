<?php


class Github extends \Nette\Object
{

	private $config;

	/** @var string Random string to prevent XSS */
	private $state = 'khan12350!647td+f';



	public function __construct($context)
	{
		$this->config = (object) $context->params['github'];
	}



	public function getIssues()
	{
		$res = file_get_contents($this->config->url . '/repos/khanovaskola/khanovaskola.cz/issues?state=open&sort=updated&direction=desc');
		$data = \Nette\Utils\Json::decode($res);
		return $data;
	}



	public function redirectAuth(\Nette\Application\UI\Presenter $presenter)
	{
		$url = 'https://github.com/login/oauth/authorize?client_id=' . $this->config->id . '&state='. urlencode($this->state) . '&scope=public_repo&redirect_uri=' . urlencode($presenter->link('//:Front:Homepage:githubCallback'));
		$presenter->redirectUrl($url);
	}



	public function tradeCodeForAuth($code)
	{
		$url = 'https://github.com/login/oauth/access_token?client_id=' . $this->config->id .
				'&client_secret=' . $this->config->secret .
				'&code=' . $code .
				'&state=' . $this->state;
		$res = $this->makeQuery($url, [], 'POST');
		return $res->access_token;
	}



	public function createIssue($data)
	{
		$query = [
			'title' => $data['label'],
			'body' => "```ruby
user_id: $data[user_id]
url: $data[url]
time: " . date('c', $data['time']) . "
```

$data[description]

*This issue has been automatically generated from user report on the website.*",
			'labels' => ['user-report']
		];

		$res = $this->makeQuery($this->config->url . '/repos/khanovaskola/khanovaskola.cz/issues', $query, 'POST');
	}



	private function makeQuery($url, $data, $method = 'GET')
	{
		$content = \Nette\Utils\Json::encode($data);
		$context = stream_context_create(['http' => [
			'method' => $method,
			'ignore_errors' => TRUE, // want to retrieve API errors
			'header' => "Content-type: application/x-www-form-urlencoded\r\n" .
				"Content-lenght: " . strLen($content) . "\r\n" .
				"Accept: application/json",
			'content' => $content,
		]]);

		$url .= '?access_token=' . $this->config->token;

		$res = file_get_contents($url, FALSE, $context);

		if (strpos($res, 'access_token=') !== FALSE) {
			$args = [];
			parse_str($res, $args);
			return (object) $args;
		}

		return \Nette\Utils\Json::decode($res);
	}

}
