<?php

namespace ApiModule;


class CategoryPresenter extends BaseApiPresenter
{

	public function get($id = NULL)
	{
		if ($id) {
			$this->sendSuccess($this->getOne($id));

		} else {
			$this->sendSuccess(['categories' => $this->getAll()]);
		}
	}



	public function getVideos($id)
	{
		$data = [];

		$category = $this->context->categories->findOneBy(['id' => $id]);
		foreach ($category->getVideos()->order('position') as $v) {
			$data[] = [
				'id' => $v->id,
				'label' => $v->label,
				'thumbnail' => $v->getMetaData()->data->thumbnail,
			];
		}

		$this->sendSuccess(['videos' => $data]);
	}



	private function getAll()
	{
		$data = [];
		foreach ($this->context->categories->findAll()->order('parent_id', 'position') as $c) {
			$data[] = [
				'id' => $c->id,
				'label' => $c->label,
				'parent_id' => $c->parent_id,
			];
		}
		return $data;
	}



	private function getOne($id)
	{
		$c = $this->context->categories->findOneBy(['id' => $id]);
		return $c->toArray();
	}

}
