<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Forms\Container;
use Model\NetteUser as ROLE;


class TranslatePresenter extends BaseFrontPresenter
{

	public function startup()
	{
		parent::startup();

		if (!$this->user->loggedIn) {
			$this->redirect(':Sign:in', ['backlink' => $this->link('this')]);
		}
	}



	public function renderDefault($file)
	{
		if (!$file) {
			$this->redirect('list');
		}

		$translation = $this->context->translations->findLatestFor($file);
		if ($translation) {
			$this->template->translation = $translation;
			$content = $translation->text;

		} else {
			$folder = file_exists(WWW_DIR . "/exercise/czech/$file.txt") ? 'czech' : 'translate';
			$content = file_get_contents(WWW_DIR . "/exercise/$folder/$file.txt");
		}
		$translate = $this->parseTranslation($content);

		foreach ($translate['tid'] as $i => $tid) {
			if (!isset($this['translateForm']['translations'][$tid]))
				$this['translateForm']['translations']->createOne($tid);

			$this['translateForm']['translations'][$tid][$tid]->setValue($translate['text'][$i]);
		}

		$this->template->translate = $translate;
	}



	private function parseTranslation($content)
	{
		$matches = [];
		preg_match_all('~(?P<tid>\d+\.\d+)\s+(?P<text>.*?)\n$~ims', $content, $matches);
		foreach ($matches['tid'] as &$tid) {
			$tid = str_replace('.', '_', $tid);
		}

		return $matches;
	}



	public function createComponentTranslateForm($name)
	{
		$form = $this->createForm($name);

		$form->addDynamic('translations', function (Container $container) {
			$container->addTextArea($container->name);
		});

		$form->addSubmit('send', 'Uložit')->controlPrototype->class = "simple-button blue";
		return $form;
	}



	public function onSuccessTranslateForm(Form $form)
	{
		$v = $form->values;
		$file = $this->getParam('file');

		$data = "";
		foreach ($v['translations'] as $tid => $c) {
			$text = end($c);
			$tid = str_replace('_', '.', $tid);
			$data .= "$tid	 $text\n\n";
		}

		$translation = $this->context->translations->findLatestFor($file);
		if ($translation) {
			// only keep one row of single users changes
			$translation->delete();
		}

		$translation = $this->context->translations->insert([
			'user_id' => $this->user->id,
			'text' => $data,
			'file' => $file,
		]);
		$translation = $this->context->translations->find($translation->id); // fix insert not returning Entity
		$translation->buildTemplate();

		$this->redirect('this');
	}



	public function renderList()
	{
		$translate = [];
		foreach (scandir(WWW_DIR . '/exercise/translate') as $file) {
			if (in_array($file, ['.', '..'])) {
				continue;
			}

			$translate[] = substr($file, 0, -4);
		}

		$czech = [];
		$completed = [];
		$completed_files = [];
		foreach ($this->context->translations->findAllLatest() as $translation) {
			$exercise = $this->context->exercises->findOneBy(['file' => $translation->file]);
			if ($exercise) {
				$completed[] = $exercise;
				$completed_files[] = $translation->file;

			} else {
				$czech[] = $translation->file;
			}
		}

		$this->template->translate = array_diff($translate, $czech, $completed_files);
		$this->template->working_on = $czech;
		$this->template->completed = $completed;
	}



	public function handlePublishExercise($file)
	{
		if (!$this->user->isInRole(ROLE::ADMIN)) {
			throw new \Nette\Application\ForbiddenRequestException();
		}

		$translation = $this->context->translations->findLatestFor($file);
		$label = $translation->getLabel();
		$ex = $this->context->exercises->insert([
			'file' => $file,
			'label' => $label,
		]);
		$ex->addSlug($label);
		$this->redirect(':Front:Exercise:edit', ['eid' => $ex->id]);
	}

}
