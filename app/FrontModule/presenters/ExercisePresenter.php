<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;


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

		$this->template->exercise = $this->exercise;
		$content = file_get_contents(WWW_DIR . "/exercise/translated/{$this->exercise->file}.html");
		$content = str_replace('src="../khan-exercise.js"', 'src="/exercise/khan-exercise.js"', $content);
		$this->template->content = $content;
	}



	public function renderList()
	{
		$this->template->categories = $this->context->categories->findWithExercises();
		//$this->template->exercises = $this->context->exercises->findAll();
	}



	public function renderEdit()
	{
		if (!$this->user->moderator) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$form = $this['editForm'];
		$ex = $this->exercise;

		$form['label']->setValue($ex->label);
		$form['file']->setValue($ex->file);
	}



	public function createComponentEditForm($name)
	{
		$form = new Form($this, $name);

		$form->addText('label', 'Název');
		$form->addText('file', 'Soubor');

		$form->addSubmit('send');
		$form->onSuccess[] = callback($this, 'onSuccessEditForm');

		return $form;
	}



	public function onSuccessEditForm(Form $form)
	{
		if (!$this->user->moderator) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;
		$ex = $this->exercise;

		$ex->label = $v->label;
		$ex->slug = \Nette\Utils\Strings::webalize($ex->label);
		$ex->file = $v->file;

		$ex->update();

		$this->redirect(':Front:Exercise:');
	}



	public function handleSaveAnswer($exercise_id, $correct)
	{
		if (TRUE || $this->ajax && $this->user->loggedIn) {
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
