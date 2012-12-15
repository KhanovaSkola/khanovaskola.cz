<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;

require(LIBS_DIR . '/' . 'simple_html_dom.php');


class ExercisePresenter extends BaseFrontPresenter
{

	/**
	 * @persistent
	 * @var int
	 */
	public $eid;

	/** @var \Exercise */
	protected $exercise;



	public function startup()
	{
		parent::startup();
		$this->exercise = $this->context->exercises->find($this->eid);
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
		$raw = file_get_contents(WWW_DIR . "/exercise/translated/{$this->exercise->file}.html");
		$raw = str_replace('src="../khan-exercise.js"', 'src="/exercise/khan-exercise.js"', $raw);
		$html = \str_get_html($raw);

		$content = ['scripts' => [], 'body' => NULL];
		foreach ($html->find('head script') as $node) {
			$content['scripts'][] = (string) $node;
		}
		$content['require'] = $html->find('html')[0]->attr['data-require'];
		$content['title'] = (string) $html->find('title')[0]->innertext;
		$content['body'] = (string) $html->find('body')[0]->innertext;

		$this->template->content = (object) $content;
	}



	public function renderList()
	{
		$this->template->categories = $this->context->categories->findWithExercises();
		//$this->template->exercises = $this->context->exercises->findAll();
	}



	public function renderEdit()
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$form = $this['editForm'];
		$ex = $this->exercise;

		$form['label']->setValue($ex->label);
		$form['file']->setValue($ex->file);
	}



	public function createComponentEditForm($name)
	{
		$form = $this->createForm($name);

		$form->addText('label', 'Název');
		$form->addText('file', 'Soubor');

		$form->addSubmit('send');
	}



	public function onSuccessEditForm(Form $form)
	{
		if (!$this->user->isInrole(\NetteUser::ROLE_EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;

		$ex = $this->exercise;
		$ex->label = $v->label;
		$ex->file = $v->file;
		$ex->update();

		$ex->addSlug($ex->label);

		$this->redirect(':Front:Exercise:');
	}



	public function handleSaveAnswer($exercise_id, $correct)
	{
		if ($this->ajax && $this->user->loggedIn) {
			$result = $this->user->entity->saveExerciseAnswer($exercise_id, $correct === 'true', function() use ($exercise_id) {
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
