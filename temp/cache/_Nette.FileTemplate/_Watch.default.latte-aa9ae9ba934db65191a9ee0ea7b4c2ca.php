<?php //netteCache[01]000414a:2:{s:4:"time";s:21:"0.69506300 1392483783";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:94:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/FrontModule/templates/Watch/default.latte";i:2;i:1392295177;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/FrontModule/templates/Watch/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'klrv9lnn1o')
;
// prolog Nette\Latte\Macros\CacheMacro
Nette\Latte\Macros\CacheMacro::initRuntime($template, $_g);

// prolog Nette\Latte\Macros\UIMacros
//
// block scripts-ajax
//
if (!function_exists($_l->blocks['scripts-ajax'][] = '_lbd27814e6a6_scripts_ajax')) { function _lbd27814e6a6_scripts_ajax($_l, $_args) { extract($_args)
;if (isset($video)): ?>
		<script>
			var video_id = <?php echo Nette\Templating\Helpers::escapeJs($video->id) ?>;
			var youtube_video_id = <?php echo Nette\Templating\Helpers::escapeJs($video->youtube_id) ?>;
			var youtube_autoplay = <?php echo Nette\Templating\Helpers::escapeJs($autoplay ? '1' : '0') ?>;
			<?php if ($user->loggedIn): ?>var youtube_progress_url = <?php echo Nette\Templating\Helpers::escapeJs($_presenter->link("updateProgress!", array('autoplay' => NULL))) ?>
;<?php endif ?>


			onLoadQueue.push(function() {
				if (youtubeReady) {
					showVideo();
				}
			});
		</script>
<?php endif ;
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb65997f38b7_content')) { function _lb65997f38b7_content($_l, $_args) { extract($_args)
?><article>
	<?php Nette\Latte\Macros\CoreMacros::includeTemplate("../_leaf.latte", $template->getParameters(), $_l->templates['klrv9lnn1o'])->render() ?>
<div class="entity" data-format="<?php if ($video->isDubbed()): ?>dubbed<?php else: ?>
original<?php endif ?>">
			<div>
<?php $exercise = $video->getExercise() ;if (!$exercise && $video->external_exercise_url): ?>
				<a href="<?php echo htmlSpecialChars($video->external_exercise_url) ?>" class="button blue float-right" target="_blank">
					Externí cvičení
				</a>
<?php endif ?>
				<h1 class="title-header">
					<span itemprop="name caption" class="title"><?php echo Nette\Templating\Helpers::escapeHtml($video->label, ENT_NOQUOTES) ?></span>
				</h1>
<?php if ($video->description): ?>				<span><span itemprop="description"><?php echo Nette\Templating\Helpers::escapeHtml($video->description, ENT_NOQUOTES) ?>
</span><?php if ($video->hasAuthor()): ?> Dabing <?php echo $video->getAuthor()->getNbName() ?>
.<?php endif ?></span>
<?php endif ;if ($user->isInrole($ROLE::ADMIN) && count($video->getSlugs()) > 1): ?>
					<div class="aliases">
						<b>Aliasy:</b>
						<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($video->getSlugs()) as $slug): ?>
<a href="<?php echo htmlSpecialChars($_control->link("this", array('vid' => $slug))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($_presenter->link("this", array('vid' => $slug)), ENT_NOQUOTES) ?>
</a><?php if (!$iterator->isLast()): ?>, <?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

					</div>
<?php endif ?>
				<div class="buttons">
<?php if ($user->isInrole($ROLE::EDITOR)): ?>					<a class="button blue" href="<?php echo htmlSpecialChars($_control->link("edit")) ?>
">Upravit</a>
<?php endif ;if ($user->isInrole($ROLE::EDITOR) || $user->isInrole($ROLE::VERIFIER)): ?>
					<a class="button blue" href="<?php echo htmlSpecialChars($_control->link("reloadSubtitles!")) ?>
">Znovu načíst titulky</a>
<?php endif ;if ($user->isInrole($ROLE::VERIFIER) && !$video->isDubbed()): if ($video->hasUserVerified($user)): ?>
							Děkujeme za ověření překladu. <a href="<?php echo htmlSpecialChars($_control->link("undoVerify!")) ?>
">Zrušit</a>.
<?php else: ?>
							<a class="button blue" href="<?php echo htmlSpecialChars($_control->link("verify!")) ?>
">Ověřil jsem překlad</a>
<?php endif ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($video->getVerifications()) as $ver): ?>
							<?php if ($iterator->isFirst()): ?><p>Ověřil: <?php endif ?>

							<?php echo Nette\Templating\Helpers::escapeHtml($ver->user->name, ENT_NOQUOTES) ;if (!$iterator->isLast()): ?>
,<?php endif ?>

							<?php if ($iterator->isLast()): ?></p><?php endif ?>

<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;endif ?>
				</div>
			</div>
<?php if (Nette\Latte\Macros\CacheMacro::createCache($netteCacheStorage, 'kwb3s72vef', $_g->caches, array($video->id, 'tags' => array('videos', "video/{$video->id}")))) { ?>
				<div>
					<nav>
<?php $prev = $video->getPreviousVideo($category) ;if ($prev): ?>						<label>
							<a href="<?php echo htmlSpecialChars($_control->link("this", array('vid' => $prev->id))) ?>
">
								<i class="icon-arrow-left"></i>
								<b>Předchozí video:</b> <?php echo Nette\Templating\Helpers::escapeHtml($prev->label, ENT_NOQUOTES) ?>

							</a>
						</label>
<?php endif ;$next = $video->getNextVideo($category) ;if ($next): ?>						<label>
							<a href="<?php echo htmlSpecialChars($_control->link("this", array('vid' => $next->id))) ?>
">
								<b>Další video:</b> <?php echo Nette\Templating\Helpers::escapeHtml($next->label, ENT_NOQUOTES) ?>

								<i class="icon-arrow-right"></i>
							</a>
						</label>
<?php endif ?>
						<div class="clear"></div>
					</nav>
				</div>
				<div class="video-container">
					<div id="player"></div>
				</div>
<?php $_ctrl = $_control->getComponent("subtitles"); if ($_ctrl instanceof Nette\Application\UI\IRenderable) $_ctrl->validateControl(); $_ctrl->render($subtitles, $video->isDubbed()) ;if ($subtitles): ?>
					<p class="float-right">
						<a rel="nofollow" target="_blank" href="<?php echo htmlSpecialChars($_control->link("editSubtitles")) ?>
">upravit titulky</a>
					</p>
<?php endif ;$_l->tmp = array_pop($_g->caches); if (!$_l->tmp instanceof stdClass) $_l->tmp->end(); } ?>
		</div>
	</div>
</article>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['scripts-ajax']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 