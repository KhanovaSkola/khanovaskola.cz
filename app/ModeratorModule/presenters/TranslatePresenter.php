<?php

namespace ModeratorModule;

use Nette\Application\UI\Form;
use Nette\Forms\Container;

class TranslatePresenter extends BaseModeratorPresenter
{

	public function renderDefault($file)
	{
		if (!$file) {
			$this->redirect('list');
		}
		
		$translate = $this->parseTranslationFile(file_exists(WWW_DIR . "/exercise/czech/$file.txt") ? 'czech' : 'translate', $file);
		
		foreach ($translate['tid'] as $i => $tid) {
			if (!isset($this['translateForm']['translations'][$tid]))
				$this['translateForm']['translations']->createOne($tid);
			
			$this['translateForm']['translations'][$tid][$tid]->setValue($translate['text'][$i]);
		}
		
		$this->template->translate = $translate;
	}
	
	
	
	private function parseTranslationFile($folder, $file)
	{
		$content = file_get_contents(WWW_DIR . "/exercise/$folder/$file.txt");
		$matches = [];
		preg_match_all('~(?P<tid>\d+\.\d+)\s+(?P<text>.*?)\n$~ims', $content, $matches);
		foreach ($matches['tid'] as &$tid) {
			$tid = str_replace('.', '_', $tid);
		}
		return $matches;
	}
	
	
	
	public function createComponentTranslateForm($name)
	{
		$form = new Form($this, $name);
	
		$form->addDynamic('translations', function (Container $container) {
			$container->addTextArea($container->name);
		});
		
		$form->addSubmit('send');
		$form->onSuccess[] = callback($this, 'onSuccessTranslateForm');
		
		return $form;
	}
	
	
	
	public function onSuccessTranslateForm(Form $form)
	{
		$v = $form->values;
		dump($v);
		
		$data = "";
		foreach ($v['translations'] as $tid => $c) {
			$text = end($c);
			$tid = str_replace('_', '.', $tid);
			$data .= "$tid	 $text\n\n";
		}
		file_put_contents(WWW_DIR . '/exercise/czech/' . $this->getParam('file') . '.txt', $data);
		
		$this->redirect('list');
	}
	
	
	
	public function renderList()
	{
		$files = [];
		foreach (scandir(WWW_DIR . '/exercise/translate') as $file) {
			if (in_array($file, ['.', '..'])) {
				continue;
			}
			
			$files[] = substr($file, 0, -4);
		}
		
		$this->template->files = $files;
	}
	
}
