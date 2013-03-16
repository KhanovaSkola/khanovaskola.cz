<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;
use Sunra\PhpSimple\HtmlDomParser;
use Model\NetteUser as ROLE;
use Entity\ExerciseDebug;


class ExercisePresenter extends BaseFrontPresenter
{

	/**
	 * @persistent
	 * @var int
	 */
	public $eid;

	/** @persistent */
	public $debug_file;

	/** @var \Exercise */
	protected $exercise;



	public function startup()
	{
		parent::startup();

		$this->exercise = $this->context->exercises->find($this->eid);
		if (!$this->exercise && $this->debug_file && $this->user->isInRole(ROLE::ADMIN)) {
			$this->exercise = new ExerciseDebug($this->context, $this->debug_file);
		}
	}



	public function renderDefault()
	{
		if (!$this->exercise) {
			$this->redirect('list');
		}

		// route without category, redirect to full url
		if (!$this->getParam('id')) {
			$cat = $this->exercise->getCategories()->fetch();
			$this->redirect('this', ['id' => $cat->id]);
		}

		$this->template->exercise = $this->exercise;
		$raw = $this->exercise->getHtmlTemplate();
		$raw = str_replace('src="../khan-exercise.js"', 'src="/exercise/khan-exercise.js"', $raw);
		$html = HtmlDomParser::str_get_html($raw);

		$content = ['scripts' => [], 'body' => NULL];
		foreach ($html->find('head script') as $node) {
			$content['scripts'][] = (string) $node;
		}
		$content['require'] = $html->find('html')[0]->attr['data-require'];
		$content['title'] = (string) $html->find('title')[0]->innertext;
		$content['body'] = (string) $html->find('body')[0]->innertext;

		$this->template->content = (object) $content;

		$this->template->is_debug = $this->exercise instanceof ExerciseDebug;
	}



	public function renderList()
	{
		$this->template->map_root = $this->context->categories->findMapRoot();
	}



	public function getSortedCategories()
	{
		$cats = [];
		foreach ($this->context->categories->findWithExercises() as $cat) {
			$cats[] = $cat;
		}
		@usort($cats, function($a, $b) {
			return $a->getMapDepth() > $b->getMapDepth() ? 1 : -1;
		});
		return $cats;
	}



	public function renderEdit()
	{
		if (!$this->user->isInrole(ROLE::EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$form = $this['editForm'];
		$ex = $this->exercise;

		$form['label']->setValue($ex->label);

		$form['categories']->setValue($ex->getCategoryIds());

		/*$related = [];
		foreach ($ex->getRelatedVideos() as $video) {
			$related[] = $video->id;
		}
		$form['related']->setValue($related);*/
	}



	public function createComponentEditForm($name)
	{
		$form = $this->createForm($name);

		$form->addText('label', 'Název');
		$form->addMultiSelect('categories', 'Kategorie', $this->context->categories->getFill());
		//$form->addMultiSelect('related', 'Videa k tématu', $this->context->videos->getFill());
		//$form->addText('file', 'Soubor');

		$form->addSubmit('send', 'Uložit');
		return $form;
	}



	public function onSuccessEditForm(Form $form)
	{
		if (!$this->user->isInrole(ROLE::EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;

		$ex = $this->exercise;
		$ex->label = $v->label;
		$ex->update();

		$ex->updateCategories($v->categories);
		$ex->addSlug($ex->label);

		$this->redirect(':Front:Exercise:');
	}



	public function handleSaveAnswer($exercise_id, $correct, $time)
	{
		if ($this->ajax && $this->user->loggedIn) {
			$result = $this->user->entity->saveExerciseAnswer($exercise_id, $correct === 'true', $time, function() use ($exercise_id) {
				// onAttainedMastery
				$task = $this->user->entity->getTaskForExercise($this->context->exercises->find($exercise_id));
				if ($task && !$task->completed) {
					$cache = new Cache($this->context->cacheStorage);
					$cache->clean([Cache::TAGS => $this->task->getTagsToInvalidate()]);
					$task->setCompleted()->update();
				}
			});

			$cache = new Cache($this->context->cacheStorage);
			$cache->clean([Cache::TAGS => ["profile/recent/exercise/{$this->user->id}"]]);

			$this->sendJson(['status' => $result ? 'success' : 'error']);
		}
		$this->terminate();
	}

}
