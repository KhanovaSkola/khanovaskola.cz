<?php

class CustomMailer {

	/**
	 * @param  string
	 * @param  string
	 * @return void
	 */
	public static function mailer($message, $email)
	{
		$host = php_uname('n');
		foreach (array('HTTP_HOST','SERVER_NAME', 'HOSTNAME') as $item) {
			if (isset($_SERVER[$item])) {
				$host = $_SERVER[$item]; break;
			}
		}

		$error = [];
		preg_match('~] (.*?)(: |in)~', $message, $error);
		$subject = isset($error[1]) ? ": $error[1]" : '';

		$match = [];
		preg_match('~@@\s*(.*?)\s*$~', $message, $match);
		$link = "http://khanovaskola.cz/log/show?file=$match[1]";

		$parts = str_replace(
			array("\r\n", "\n"),
			array("\n", PHP_EOL),
			array(
				'headers' => implode("\n", array(
					"From: noreply@$host",
					'X-Mailer: Nette Framework',
					'Content-Type: text/plain; charset=UTF-8',
					'Content-Transfer-Encoding: 8bit',
				)) . "\n",
				'subject' => "Error on $host$subject",
				'body' => "[" . @date('Y-m-d H:i:s') . "] $message\n\nView the error on $link", // @ - timezone may not be set
			)
		);

		mail($email, $parts['subject'], $parts['body'], $parts['headers']);
	}
}
