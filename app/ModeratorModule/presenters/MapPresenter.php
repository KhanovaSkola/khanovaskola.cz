<?php

namespace ModeratorModule;


class MapPresenter extends BaseModeratorPresenter
{

	public function renderDefault()
	{

	}



	public function createComponentAddLinkForm($name)
	{
		$form = $this->createForm($name);

		$control = $form->addSelect('parent_id', 'Kořen', $this->context->categories->getFill())
			->getControlPrototype();
		$control->attrs['autofocus'] = TRUE;

		$form->addMultiSelect('child_id', 'Větev', $this->context->categories->getFill());

		$form->addSubmit('send', 'Přidat vazbu');
		return $form;
	}



	public function onSuccessAddLinkForm($form)
	{
		$v = $form->values;

		$cat = $this->context->categories->find($v->parent_id);
		foreach ($v->child_id as $cid) {
			$cat->addMapRelation($this->context->categories->find($cid));
		}

		$this->flashMessage('Vazby přidány.');
		$this->redirect('this');
	}

}
