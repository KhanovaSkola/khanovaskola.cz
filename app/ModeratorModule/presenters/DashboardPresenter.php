<?php

namespace ModeratorModule;

use Nette\Caching\Cache;
use Model\NetteUser as ROLE;


class DashboardPresenter extends BaseModeratorPresenter
{

	/** parent, for adding new categories */
	private $category = NULL;

	public function renderDefault()
	{
		$cat = [];
		$cat['description'] = $this->context->categories->findBy(['description' => '']);
		$this->template->cat = $cat;

		$vid = [];
		$vid['description'] = $this->context->videos->findBy(['description' => '']);

		$ids = [];
		foreach ($this->context->videos->findBy(['exercise_id IS NOT NULL']) as $video) {
			$ids[] = $video['exercise_id'];
		}
		$vid['exercise'] = $this->context->exercises->findBy(['id NOT IN ?' => $ids]);
		$vid['nogroupex'] = $this->context->exercises->findWithoutCategory();

		$this->template->limit = 10;
		$this->template->to_publish = $this->context->articles->findPublished(FALSE);
		$this->template->vid = $vid;
		$this->template->github = new \Model\Github($this->context);

		$this->template->wanted_cats = $this->context->categories->findByVotes();
	}



	public function renderVideos()
	{
		if (!$this->user->isInrole(ROLE::VERIFIER)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$dubbed = "khanacademyczech";
		$this->template->notVerified = $this->context->videos->findNotVerified()->where('uploader <> ?', $dubbed);
		$this->template->oneVerification = $this->context->videos->findWithVerification(1)->where('uploader <> ?', $dubbed);
		$this->template->forDubbing = $this->context->videos->findReadyForDubbing()->where('uploader <> ?', $dubbed);
	}



	public function renderSubtitles()
	{
		if (!$this->user->isInrole(ROLE::VERIFIER)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$errors = [];
		foreach ($this->context->videos->findAll() as $video) {
			$errors[] = (object) [
				'errors' => $this->context->subsChecker->getErrors($video),
				'video' => $video,
			];
		}
		$this->template->errors = $errors;
	}



	public function handleAddExercise()
	{
		$exercise = $this->context->exercises->insert([]);
		$this->redirect(':Front:Exercise:edit', ['eid' => $exercise->id]);
	}



	public function renderDetachedExercises()
	{
		$this->template->detached = $this->getDetachedExercises();
	}



	public function handlePopulateDb($file = NULL)
	{
		if (!$this->user->isInrole(ROLE::ADMIN)) {
			$this->redirect(':Moderator:Dashboard:');
		}

		$exercises = $this->getDetachedExercises();
		if (!$file) {
			foreach ($exercises as $file => $label) {
				$ex = $this->context->exercises->insert([
					'file' => $file,
					'label' => $label,
				]);
				$ex->addSlug($label);
			}

		} else {
			$label = $exercises[$file];
			$ex = $this->context->exercises->insert([
				'file' => $file,
				'label' => $label,
			]);
			$ex->addSlug($label);
			$this->redirect(':Front:Exercise:', ['eid' => $ex->id]);
		}
		$this->redirect('this');
	}



	private function getDetachedExercises()
	{
		$detached = [];
		$path = WWW_DIR . "/exercise/translated";

		foreach (scandir($path) as $fullfile) {
			if (in_array($fullfile, ['.', '..'])) {
				continue;
			}

			$file = substr($fullfile, 0, -5);
			$exercise = $this->context->exercises->findOneBy(['file' => $file]);
			if (!$exercise) {
				$template = file_get_contents("$path/$fullfile");
				$match = [];
				preg_match('~(?<=<title>).*?(?=</title>)~', $template, $match);
				$detached[$file] = $match[0];
			}
		}

		return $detached;
	}



	public function handleAttachToGithub()
	{
		if (!$this->user->isInrole(ROLE::ADMIN)) {
			$this->redirect(':Moderator:Dashboard:');
		}

		$github = new \Model\Github($this->context);
		$github->redirectAuth($this);
	}



	public function handleClearCache()
	{
		if (!$this->user->isInrole(ROLE::ADMIN)) {
			$this->redirect(':Moderator:Dashboard:');
		}

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::ALL => TRUE]);

		$this->flashMessage('Cache byla smazána.');
		$this->redirect('this');
	}



	public function handleRefreshIssues()
	{
		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => ['issues']]);

		$this->flashMessage('List problému byl obnoven.');
		$this->redirect('this');
	}



	public function handleTrimYoutubeIds()
	{
		if (!$this->user->isInrole(ROLE::ADMIN)) {
			$this->redirect(':Moderator:Dashboard:');
		}

		$count = $this->context->videos->trimYoutubeIds();

		$this->flashMessage('Youtube_id bylo opraveno u ' . $count . ' videí.');
		$this->redirect('this');
	}



	public function handleAddDubbedTagToVideos()
	{
		if (!$this->user->isInrole(ROLE::ADMIN)) {
			$this->redirect(':Moderator:Dashboard:');
		}

		$count = $this->context->videos->addDubbedTagToVideos();
		if ($count === FALSE) {
			$this->flashMessage('Tag pro dabovaná videa neexistuje!');
		} else {
			$this->flashMessage("Dabovací tag byl přidán k $count videím.");
		}

		$this->redirect('this');
	}



	public function handleDownloadAutocomplete()
	{
		$dir = APP_DIR . '/../temp/autocomplete';
		@mkdir($dir);
		$file = "$dir/khanova-skola-autocomplete-" . date('y-m-d') . ".xml";

		$content = "<Autocompletions>\n";
		foreach ($this->context->database->table('_autocomplete') as $row) {
			$label = str_replace('"', '\"', $row['label']);
			$content .= "\t<Autocompletion term=\"$label\" type=\"1\" language=\"\" />\n";
		}
		$content .= "</Autocompletions>\n";
		file_put_contents($file, $content);

		$this->sendResponse(new \Nette\Application\Responses\FileResponse($file));
	}



	public function handleSaveMetadata()
	{
		$videos = $this->context->videos->findBy(['duration' => 0]);
		$updated = 0;
		$depleted = FALSE;
		foreach ($videos as $video) {
			if (!$video->updateMetaData()) {
				$depleted = TRUE;
				break;
			}
			$video->update();
			$updated++;
		}

		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => ['categories', 'videos/count']]);

		if ($depleted) {
			$this->flashMessage("Vyčerpali jsme limit Amara API, stáhněte prosím další metadata za chvíli.");
		}
		$this->flashMessage("Meta data byla doplněna u $updated videí.");

		$this->redirect('this');
	}



	public function handleCacheSubtitles()
	{
		set_time_limit(0);
		$videos = $this->context->videos->findAll();

		foreach ($videos as $video) {
			$subs = $this->context->amara->getSubtitles($video);
			if (!$subs) {
				$this->context->amara->clearCache($video);
				$this->context->amara->getSubtitles($video);
			}
		}

		$this->flashMessage("Cache titulků byla obnovena.");
		$this->redirect('this');
	}



	public function actionNewCategory($parent = NULL)
	{
		if ($parent) {
			$this->category = $this->context->categories->find($parent);
		}
		
		$this->template->category = $this->category;
	}



	public function createComponentPickParentForm($name)
	{
		$form = $this->createForm($name);

		$form->addSelect('parent', 'Vytvořit podkategorii v', $this->context->categories->getFillAll())
			->setRequired('Vyberte nadřazenou kategorii');

		$form->addSubmit('send', 'Pokračovat')->controlPrototype->class = "simple-button green";
		return $form;
	}



	public function onSuccessPickParentForm($form)
	{
		$this->redirect('this', ['parent' => $form['parent']->value]);
	}



	public function createComponentNewCategoryForm($name)
	{
		$form = $this->createForm($name);
		$form->addText('label', 'Název')
			->setRequired('Vyplňte název nové kategorie');
		$form->addTextArea('description', 'Popis');
		$form->addHidden('parent')->setDefaultValue($this->category->id);

		$videos = $form->addContainer('videos');
		foreach ($this->category->getVideos() as $video)
		{
			$videos->addCheckbox($video->id, $video->label);
		}

		$form->addSubmit('send', 'Vytvořit kategorii')->controlPrototype->class = "simple-button green";
		return $form;
	}



	public function onSuccessNewCategoryForm($form)
	{
		if (!$this->user->isInrole(ROLE::ADDER)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;
		if ($cat = $this->context->categories->slugExistsForLabel($v->label)) {
			$form->addError('Kategorie s tímto názvem už v databázi existuje.');
			return FALSE;
		}

		try {
			$cat = $this->context->categories->insert([
				'label' => $v->label,
				'description' => $v->description,
				'parent_id' => $v->parent,
				'is_leaf' => TRUE,
				'position' => 0, // TODO
				'playlist_en' => '',
			]);
			$cat->addSlug($cat->label);

			foreach ($v->videos as $vid => $move)
			{
				if (!$move)
					continue;

				$video = $this->context->videos->find($vid);
				$this->category->removeVideo($video);
				$cat->addVideo($video);
			}

			$this->category->is_leaf = FALSE;
			$this->category->update();

		} catch (\PDOException $e) {
			if ($e->getCode() == 23000)
			{
				$form->addError('Kategorie s tímto názvem už v databázi existuje.');
				return FALSE;
			}
			$form->addError($e->getMessage());
			return FALSE;
		}


		// invalidate cache
		$invalid = ["videos", "category/{$this->category->id}"];
		foreach ($v['videos'] as $vid) {
			$invalid[] = "video/$vid";
		}
		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => $invalid]);

		$this->flashMessage('Kategorie byla přidána.');
		$this->redirect('this');
	}

	public function createComponentEditRolesForm($name)
	{
		$form = $this->createForm($name);

		$fill = $this->context->users->findAll()
			->select('id, Concat(name, " – ", mail) AS label')->fetchPairs('id', 'label');

		$form->addSelect('user', 'Vytvořit podkategorii v', $fill)
			->setRequired('Vyberte uživatele');

		$roles = $form->addContainer('roles');
		$roles->addCheckbox('editor', 'Editovat videa');
		$roles->addCheckbox('adder', 'Přidávat videa');
		$roles->addCheckbox('verifier', 'Korektor');
		$roles->addCheckbox('blog', 'Přispívat na blog');

		$form->addSubmit('send', 'Uložit')->controlPrototype->class = "simple-button green";
		return $form;
	}

	public function actionEditRoles($userId = NULL)
	{
		if ($userId)
		{
			$this['editRolesForm']['user']->setDefaultValue($userId);

			$user = $this->context->users->find($userId);
			foreach ($this['editRolesForm']['roles']->getControls() as $key => $box)
			{
				// dump($key, $user->inRole($key));
				if ($user->inRole($key))
				{
					$this['editRolesForm']['roles'][$key]->setDefaultValue(TRUE);
				}
			}
		}
	}

	public function onSuccessEditRolesForm($form)
	{
		if (!$this->user->isInrole(ROLE::ADMINER)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$v = $form->values;
		$user = $this->context->users->find($v->user);

		$roles = [];
		foreach ($v->roles as $role => $checked)
		{
			if ($checked)
			{
				$roles[] = $role;
			}
		}
		$user->role = implode(';', $roles);
		$user->update();

		$this->flashMessage('Práva nastavena. Změna se projeví po dalším přihlášení.');
		$this->redirect('this');
	}

}
