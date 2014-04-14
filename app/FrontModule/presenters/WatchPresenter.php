<?php

namespace FrontModule;

use Nette\Application\UI\Form;
use Nette\Caching\Cache;
use Model\NetteUser as ROLE;


class WatchPresenter extends BaseFrontPresenter
{

	/**
	 * @persistent
	 * @var int
	 */
	public $vid;

	/** @var \Video */
	protected $video;

	/**
	 * @persistent
	 * @var int
	 */
	public $id;

	/** @var \Category */
	protected $category;



	public function startup()
	{
		parent::startup();

		$this->video = $this->context->videos->find($this->vid);

		if (in_array($this->action, ['add', 'redirect'])) {
			return;
		}

		if ($this->video && !$this->id) {
			$this->redirect(301, 'this', [
				'id' => $this->video->getOneCategoryId(),
			]);
		}

		$this->category = $this->context->categories->find($this->id);
		if (!$this->category || !$this->video || !$this->category->containsVideo($this->video)) {
			throw new \Nette\Application\BadRequestException;
		}
	}



	public function actionRedirect($youtube_id)
	{
		$video = $this->context->videos->findOneBy(['youtube_id' => $youtube_id]);
		if (!$video) {
			throw new \Nette\Application\BadRequestException;
		}
		$this->redirect('default', [
			'id' => $video->getOneCategoryId(),
			'vid' => $video->id,
			'youtube_id' => NULL,
		]);
	}



	public function renderAlias()
	{
		$this->redirect('default');
	}



	public function renderDefault($autoplay = 0)
	{
		$this->template->autoplay = $autoplay;
		$this->template->video = $this->video;
		$this->template->category = $this->category;

		$cache = new Cache($this->context->cacheStorage, 'subtitles');
		$key = $this->video->youtube_id;
		if (!$cache->load($key)) {
dump('reloading subtitles');
			$subs = $this->video->getSubtitles();
			$cache->save($key, $subs);
			$this->template->subtitles = $subs;
		} else {
			$this->template->subtitles = $cache->load($key);
		}
	}



	public function actionAdd()
	{
		if (!$this->user->isInrole(ROLE::ADDER)) {
			$this->redirect(':Sign:in', ['request' => $this->storeRequest()]);
		}
	}


	public function renderAdd($youtube_id = NULL, $label = NULL, $desc = NULL,
		$revision = NULL, $revisionId = NULL, $originalId = NULL, $callback = NULL, $hash = NULL)
	{

		if (!$this['videoForm']->submitted)
		{
			if ($revision === NULL || $callback === NULL || $revisionId === NULL
				|| $originalId === NULL || $hash === NULL)
			{
				$this->sendJson(['Omlouvam se, takhle rovnou uz to nejde, pridavejte prosim videa pouze z reportu. Pokud to z nejakeho duvodu nejde, napiste mi prosim na mikulas@khanovaskola.cz, dekuji.']);
			}
			if (md5("$revision|$callback|$revisionId|$originalId") !== $hash)
			{
				$this->error();
			}
		}

		$this['videoForm']['categories']->setDefaultValue([$this->id]);

		$this['videoForm']['youtube_id']->setDefaultValue($youtube_id);
		$this['videoForm']['label']->setDefaultValue($label);
		$this['videoForm']['description']->setDefaultValue($desc);

		$this['videoForm']['revision']->setDefaultValue($revision);
		$this['videoForm']['callback']->setDefaultValue($callback);
		$this['videoForm']['revisionId']->setDefaultValue($revisionId);
		$this['videoForm']['originalId']->setDefaultValue($originalId);
	}



	public function handleUpdateProgress($seconds)
	{
		if ($this->ajax && $this->user->loggedIn) {
			$this->user->entity->setProgress($this->video, $this->category, $seconds, function() {
				// onVideoWatched
				$task = $this->user->entity->getTaskForVideo($this->video);
				if ($task && !$task->completed) {
					$cache = new Cache($this->context->cacheStorage);
					$cache->clean([Cache::TAGS => $this->task->getTagsToInvalidate()]);
					$task->setCompleted()->update();
				}
			});

			$cache = new Cache($this->context->cacheStorage, 'dynamic_css');
			$cache->clean([Cache::TAGS => "watched/{$this->user->id}"]);

			$this->sendJson(['status' => 'success']);
		}

		$this->terminate();
	}



	public function createComponentAliasForm($name)
	{
		$form = $this->createForm($name);

		$form->addText('alias', 'Alias');

		$form->addSubmit('send', 'Přidat')->controlPrototype->class = "simple-button blue";
		return $form;
	}



	public function onSuccessAliasForm($form)
	{
		$v = $form->values;
		if ($this->video->addAlias($v->alias)) {
			$this->flashMessage('Alias byl úspěšně přidán.');
			$this->redirect('default');
		} else {
			$form->addError('Tento alias je už používaný.');
		}
	}



	public function createComponentVideoForm($name)
	{
		$form = $this->createForm($name);

		$form->addText('youtube_id', 'Youtube ID', NULL, 11) // every youtube_id has 11 chars
			->setRequired('Vyplňte Youtube ID');
		$form->addText('label', 'Název')
			->setRequired('Vyplňte název videa');
		$form->addTextArea('description', 'Popis');
		$form->addMultiSelect('tags', 'Tagy', $this->context->tags->getFill());
		$form->addMultiSelect('categories', 'Kategorie', $this->context->categories->getFill())
			->setRequired('Vyberte alespoň jednu kategorii');
		$form->addSelect('author_id', 'Dabing', $this->context->authors->getFill());
		$form->addSelect('exercise_id', 'Cvičení', $this->context->exercises->getFill());
		$form->addText('external_exercise_url', 'Externí cvičení (url)');
		$form->addHidden('callback');
		$form->addHidden('revision');
		$form->addHidden('revisionId');
		$form->addHidden('originalId');

		$form->addSubmit('send', 'Uložit')->controlPrototype->class = "simple-button green";
		return $form;
	}



	public function onSuccessVideoForm($form)
	{
		$v = $form->values;

		if (($this->action === 'add' || $this->video->youtube_id !== $v->youtube_id)
		 && $this->context->videos->findBy(['youtube_id' => $v->youtube_id])->count()) {
			$form->addError('Tohle video (id) už v databázi máme.');
			return FALSE;
		}

		if (!count($v->categories)) {
			$form->addError('Vyberte prosím alespoň jednu kategorii.');
			return FALSE;
		}

		$author_id = $v->author_id != 0 ? $v->author_id : NULL;

		if ($this->action === 'add') {
			if (!$this->user->isInrole(ROLE::ADDER)) {
				throw new \Nette\Application\ForbiddenRequestException;
			}

			if ($old_vid = $this->context->videos->slugExistsForLabel($v->label)) {
				$form->addError('Video s tímto názvem už v databázi existuje, ale youtube_id se neshoduje. Máme-li dabing, možná přidáváte originální verzi.');
				return FALSE;
			}

			try {
				$vid = $this->context->videos->insert([
					'label' => $v->label,
					'description' => $v->description,
					'youtube_id' => $v->youtube_id,
					'author_id' => $author_id,
					'exercise_id' => $v->exercise_id == 0 ? NULL : $v->exercise_id,
					'revision' => $v->revision,
					'revision_id' => $v->revisionId,
					'original_id' => $v->originalId,
					'external_exercise_url' => $v->external_exercise_url,
				]);
			} catch (\PDOException $e) {
				if ($e->getCode() != 23000) {
					throw $e;
				}
				$form->addError('Toto jméno má už jiné video zabrané.');
				return FALSE;
			}

			$video = $this->context->videos->find($vid->id);
			$video->addSlug($video->label);
			$video->updateMetaData();
			$video->update();

			if ($v->callback)
			{
				$res = file_get_contents($v->callback);
				\Nette\Diagnostics\Debugger::log("Video add callback responded with: '$res'");
			}
			else
			{
				\Nette\Diagnostics\Debugger::log("Video added without callback, this should not happen!");
			}

			foreach ($v->categories as $cid) {
				$this->context->categories->find($cid)->addVideo($video);
			}
			foreach ($v->tags as $tid) {
				$video->addTag($tid);
			}

		} else { // edit
			if (!$this->user->isInrole(ROLE::EDITOR)) {
				throw new \Nette\Application\ForbiddenRequestException;
			}

			$vid = $this->video;
			$vid->label = $v->label;
			$vid->description = $v->description;
			$vid->author_id = $author_id;
			$vid->exercise_id = $v->exercise_id == 0 ? NULL : $v->exercise_id;
			$vid->external_exercise_url = $v->external_exercise_url;
			$vid->youtube_id = $v->youtube_id;
			$vid->updateMetaData();
			$vid->update();

			$vid->addSlug($v->label);

			$vid->updateTags($v['tags']);
			$vid->updateCategories($v['categories']);
		}

		// invalidate cache
		$invalid = ["videos", "video/$vid->id"];
		foreach ($v['categories'] as $cid) {
			$invalid[] = "category/$cid";
		}
		foreach ($v['tags'] as $tid) {
			$invalid[] = "tag/$tid";
		}
		if ($this->action === 'add') {
			$invalid[] = "videos/count";
		}
		$cache = new Cache($this->context->cacheStorage);
		$cache->clean([Cache::TAGS => $invalid]);

		$this->redirect('default', ['vid' => $vid->id, 'id' => $vid->getOneCategoryId()]);
	}



	public function renderEdit()
	{
		if (!$this->user->isInrole(ROLE::EDITOR)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$form = $this['videoForm'];
		$vid = $this->video;

		$form['label']->setValue($vid->label);
		$form['description']->setValue($vid->description);
		$form['youtube_id']->setValue($vid->youtube_id);
		$form['tags']->setValue($vid->getTagsIds());
		$form['categories']->setValue($vid->getCategoryIds());
		$form['exercise_id']->setValue($vid->exercise_id);
		$form['author_id']->setValue($vid->author_id);
		$form['external_exercise_url']->setValue($vid->external_exercise_url);
	}



	public function actionEditSubtitles()
	{
		$language = 'cs';
		$youtube = 'http://www.youtube.com/watch?v=' . $this->video->youtube_id;
		$amaraId = $this->context->report->getAmaraId($this->video);
		$url = 'http://www.amara.org/en/onsite_widget/?' .
			http_build_query([
				'config' => json_encode([
					'videoID' => $amaraId,
					'videoURL' => $youtube,
					'effectiveVideoURL' => $youtube,
					'languageCode' => $language,
					'originalLanguageCode' => null,
					'subLanguagePK' => null,
					'baseLanguageCode' => 'en'
				]),
			]);
		$this->redirectUrl($url);
	}



	public function handleVerify()
	{
		if (!$this->user->isInrole(ROLE::VERIFIER)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$this->video->verify($this->user);
		$this->invalidateAfterVerify();
		$this->redirect('this');
	}



	public function handleUndoVerify()
	{
		if (!$this->user->isInrole(ROLE::VERIFIER)) {
			throw new \Nette\Application\ForbiddenRequestException;
		}

		$this->video->undoVerify($this->user);
		$this->invalidateAfterVerify();
		$this->redirect('this');
	}



	private function invalidateAfterVerify()
	{
		$cache = new Cache($this->context->cacheStorage);
		$invalid = [];
		foreach ($this->video->getCategories() as $cat)
		{
			$invalid[] = "verifier/category/$cat->id";
		}
		$cache->clean([Cache::TAGS => $invalid]);
	}



	public function actionSetRevision($revision, $revisionId, $code)
	{
		if ($code !== crypt($this->vid . $revisionId, '$2y$10$' . substr(md5($this->vid), 0, 22)))
		{
			$this->error();
		}

		$cache = new Cache($this->context->cacheStorage, 'subtitles');
		$key = $this->video->youtube_id;
		$cache->remove($key);

		$this->video->revision = $revision;
		$this->video->revision_id = $revisionId;
		$this->video->update();
		$this->sendJson(['result' => 'success']);
	}


	public function actionAdEditor()
	{
		if (!$this->user->loggedIn || !$this->user->isInRole('editor'))
		{
			$this->error();
		}
	}

	public function createComponentAdvertForm($name)
	{
		$form = $this->createForm($name);

		$v = $this->video;
		$ad = $v->getAdvert();

		$form->addText('title', 'Titulek')
			->setRequired()
			->setDefaultValue($ad ? $ad->title : trim($v->label, '.?!:'))
			->controlPrototype->{"data-max"}(25);
			
		$form->addText('text1', 'Text 1')
			->setRequired()
			->setDefaultValue($ad ? $ad->text1 : 'První řádek')
			->controlPrototype->{"data-max"}(35);
			
		$form->addText('text2', 'Text 2')
			->setRequired()
			->setDefaultValue($ad ? $ad->text2 : 'Druhý řádek')
			->controlPrototype->{"data-max"}(35);
			
		$form->addText('url', 'Url')
			->setRequired()
			->setDefaultValue($ad ? $ad->url : 'khanovaskola.cz/' . $v->getSlug())
			->controlPrototype->{"data-max"}(35);

		$form->addTextArea('keywords', 'Klíčová slova')
			->setDefaultValue($ad ? $ad->keywords : '')
			->setRequired();

		$form->addSubmit('send', 'Uložit')->controlPrototype->class = "simple-button green";
		return $form;
	}

	public function onSuccessAdvertForm($form)
	{
		if (!$this->user->isInRole('editor'))
		{
			$this->error();
		}

		$v = $form->values;
		$vid = $this->context->adverts->insert([
			'video_id' => $this->video->id,
			'title' => $v->title,
			'text1' => $v->text1,
			'text2' => $v->text2,
			'keywords' => $v->keywords,
			'url' => $v->url,
			'created_at' => new \DateTime,
			'user_id' => $this->user->id,
		]);

		$this->redirect('default');
	}

}
