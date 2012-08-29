<?php

namespace TabletModule;


class BrowsePresenter extends BaseTabletPresenter
{

	/**
	 * @persistent
	 * @var int
	 */
	public $id;

	/** @var \Category */
	protected $category;

	/**
	 * @persistent
	 * @var int
	 */
	public $vid;

	/** @var \Video */
	protected $video;



	public function startup()
	{
		parent::startup();
		$this->category = $this->context->categories->findOneBy(['id' => $this->id]);
		if (!$this->category) {
			throw new \Nette\Application\BadRequestException;
		}

		$this->video = $this->context->videos->findOneBy(['id' => $this->vid]);
		if ($this->vid && !$this->video) {
			throw new \Nette\Application\BadRequestException;
		}
	}



	public function renderDefault()
	{
		$this->template->category = $this->category;
	}



	public function renderLeaf()
	{
		$this->template->category = $this->category;
		$this->template->video = $this->video;
	}

}
