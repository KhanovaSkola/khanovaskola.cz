<?php

namespace ApiModule;


class VideoPresenter extends BaseApiPresenter
{

	public function get($id)
	{
		$video = $this->context->videos->find($id);

		$data = $video->toArray();
		$data['thumbnail'] = $video->getMetaData()->data->thumbnail->hqDefault;
		$data['content'] = $video->getMetaData()->data->content;

		$this->sendSuccess($data);
	}

}
