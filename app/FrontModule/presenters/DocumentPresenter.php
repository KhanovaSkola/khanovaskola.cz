<?php

namespace FrontModule;

use Nette\Application\UI\Form;


class DocumentPresenter extends BaseFrontPresenter
{

	public function renderDefault()
	{
		$this->template->documents = $this->context->documents->findAll()->order('timestamp DESC');
	}



	public function createComponentAddForm($name)
	{
		$form = $this->createForm($name);

		$form->addText('name', 'Název')
			->setRequired('Zadejte prosím název dokumentu');
		$form->addUpload('file', 'Dokument')
			->setRequired('Zvolte dokument, který chcete zveřejnit');

		$form->addSubmit('send', 'Nahrát');
	}



	public function onSuccessAddForm($form)
	{
		$v = $form->values;

		if ($v->file->isOk()) {
			$file = substr(md5($v->name), 0, 7) . '_' . $v->file->name;
			$v->file->move(WWW_DIR . '/documents/' . $file);
		}

		$this->context->documents->insert([
			'file' => $file,
			'name' => $v->name,
		]);

		$this->flashMessage('Dokument byl v pořádku uložen.');
		$this->redirect('default');
	}

}
