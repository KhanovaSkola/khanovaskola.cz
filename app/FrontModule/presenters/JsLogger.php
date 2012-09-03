<?php

namespace FrontModule;


class JsLoggerPresenter extends BaseFrontPresenter
{

	public function actionDefault($description, $line, $parent_url, $user_agent, $user_id)
	{
		$content = "$description on line $line | $parent_url | $user_agent | user_id $user_id\n";
		file_put_contents(WWW_DIR . '/../log/js_errors.log', $content, FILE_APPEND);
		$this->terminate();
	}

}
