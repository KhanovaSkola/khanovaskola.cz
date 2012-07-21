<?php

namespace ModeratorModule;

class DashboardPresenter extends BaseModeratorPresenter
{

	public function renderDefault()
	{
		$this->template->categoriesWithoutDescription = $this->context->categories->findBy(['description' => ''])->count();
	}
	
}
