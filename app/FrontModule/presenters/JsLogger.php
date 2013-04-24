<?php

namespace FrontModule;


class JsLoggerPresenter extends BaseFrontPresenter
{

	public function actionDefault($description, $line, $parent_url, $user_agent, $user_id)
	{
		$user = $user_id ? $user_id : "n/a";
		$content = date("Y-m-d H:i:s") . " [user $user] $description on line $line\n\t$parent_url\n\t$user_agent\n";
		file_put_contents(WWW_DIR . '/../log/js_errors.log', $content, FILE_APPEND);
		$this->terminate();
	}

}
