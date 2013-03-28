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

		$exercise = $this->context->exercises->findOneBy(['file' => $file]);
		if ($exercise && !$this->user->isInRole(ROLE::ADMIN)) {
			throw new \Nette\Application\ForbiddenRequestException();
		}

		$translation = $this->context->translations->findLatestFor($file);
		if ($translation) {
			$this->template->translation = $translation;
			$content = $translation->text;

		} else {
			$folder = file_exists(WWW_DIR . "/exercise/czech/$file.txt") ? 'czech' : 'translate';
			$content = file_get_contents(WWW_DIR . "/exercise/$folder/$file.txt");
		}
		$translate = $this->parseTranslation(file_get_contents(WWW_DIR . "/exercise/translate/$file.txt"));
		$czech = $this->parseTranslation($content);

		foreach ($czech['tid'] as $i => $tid) {
			if (!isset($this['translateForm']['translations'][$tid]))
				$this['translateForm']['translations']->createOne($tid);

			$this['translateForm']['translations'][$tid][$tid]->setValue($czech['text'][$i]);
		}

		$this->template->translate = $translate;
		$this->template->czech = $czech;

		$this->template->is_translated = $this->isTranslated($file);
	}



	protected function isTranslated($file)
	{
		$translation = $this->context->translations->findLatestFor($file);
		if ($translation) {
			$content = $translation->text;

		} else {
			$folder = file_exists(WWW_DIR . "/exercise/czech/$file.txt") ? 'czech' : 'translate';
			$content = file_get_contents(WWW_DIR . "/exercise/$folder/$file.txt");
		}
		$translate = $this->parseTranslation(file_get_contents(WWW_DIR . "/exercise/translate/$file.txt"));
		$czech = $this->parseTranslation($content);

		foreach ($czech['tid'] as $i => $tid) {
			if ($czech['text'][$i] === $translate['text'][$i]) {
				return FALSE;
			}
		}

		return TRUE;
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
		$to_control = [];
		$completed = [];
		$completed_files = [];
		foreach ($this->context->translations->findAllLatest() as $translation) {
			$exercise = $this->context->exercises->findOneBy(['file' => $translation->file]);
			if ($exercise) {
				$completed[] = $exercise;
				$completed_files[] = $translation->file;

			} else {
				if ($this->isTranslated($translation->file)) {
					$to_control[] = $translation->file;
				} else {
					$czech[] = $translation->file;
				}
			}
		}

		$this->template->translate = array_diff($translate, $to_control, $czech, $completed_files);
		$this->template->working_on = $czech;
		$this->template->to_control = $to_control;
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
