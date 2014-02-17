<?php //netteCache[01]000417a:2:{s:4:"time";s:21:"0.55785200 1392483716";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:97:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/FrontModule/templates/Homepage/default.latte";i:2;i:1392295176;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/FrontModule/templates/Homepage/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '17676ahwk7')
;
// prolog Nette\Latte\Macros\CacheMacro
Nette\Latte\Macros\CacheMacro::initRuntime($template, $_g);

// prolog Nette\Latte\Macros\UIMacros
//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb02c7871674_head')) { function _lb02c7871674_head($_l, $_args) { extract($_args)
?><style>.smaller { font-size: 9pt !important; }</style>
<?php
}}

//
// block scripts-ajax
//
if (!function_exists($_l->blocks['scripts-ajax'][] = '_lb43121692a8_scripts_ajax')) { function _lb43121692a8_scripts_ajax($_l, $_args) { extract($_args)
?><script>
	onLoadQueue.push(function() {
		// on first request of Homepage load dictionary
		if (typeof autocomplete_dictionary === 'undefined') {
			autocomplete_dictionary = ['empty']; // set it up so autocomplete initiates
			$.ajax(<?php echo Nette\Templating\Helpers::escapeJs($_presenter->link(":Static:autocomplete")) ?>, {
				cache: true,
				success: function(res) {
					autocomplete_dictionary = res;
					// refresh the dictionary
					$("#frm-search [name=query]").autocomplete({ source: autocomplete_dictionary});
				}
			});
		}

		$("#frm-search [name=query]").autocomplete({
			source: autocomplete_dictionary,
			minLength: 2,
			delay: 0,
			select: function(event, ui) {
				$("#frm-search").submit();
			},
			open: function() {
				$(this).removeClass("ui-corner-all").addClass("ui-corner-top");
			},
			close: function() {
				$(this).removeClass("ui-corner-top").addClass("ui-corner-all");
			}
		});
		$(".page-search [role=status]").hide();
	});
</script>
<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbbf8d3c4c74_content')) { function _lbbf8d3c4c74_content($_l, $_args) { extract($_args)
?><article>
	<div class="main-search">
		<label for="large-search-input">
			<h1>Naučte se něco nového</h1>
		</label>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = (is_object("search") ? "search" : $_control["search"]), array('class' => "page-search no-ajax")) ?>
			<i class="icon-search"></i>
			<input name="query" id="large-search-input" class="search-input ui-autocomplete-input" autocomplete="off" placeholder="Příklady: <?php echo htmlSpecialChars($search_examples) ?>" role="textbox" aria-autocomplete="list" aria-haspopup="true" autofocus="autofocus" />
			<input type="submit" class="button gray" value="Hledat" />
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
	</div>
		<div>
		<div class="category-blocks col1 fifty-fifty">
<?php if (Nette\Latte\Macros\CacheMacro::createCache($netteCacheStorage, 'cr4vlv3zb5', $_g->caches, array('tags' => array('categories', 'videos')))) {   $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($subjects) as $subject): ?>
					<h4><?php echo Nette\Templating\Helpers::escapeHtml($subject->label, ENT_NOQUOTES) ?></h4>
					<div>
						<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($subject->getSubCategories()) as $category): call_user_func(reset($_l->blocks['category_link']), $_l, array('category' => $category) + get_defined_vars()) ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

					</div>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;$_l->tmp = array_pop($_g->caches); if (!$_l->tmp instanceof stdClass) $_l->tmp->end(); } ?>
		</div>
		<div class="col2 fifty-fifty main-text">
			<h1>Soutěž <a href="http://umis-ucit.khanovaskola.cz/">Umíš učit</a> otevřena k hlasování.</h1>
			<p>Přijďte vybrat nejlepší česká výuková videa ze soutěže <a href="http://umis-ucit.khanovaskola.cz/">Umíš učit</a>.</p>
			<hr />
			<h1><a href="<?php echo htmlSpecialChars($_control->link(":Front:Watch:", array('id' => $featured_video->getOneCategoryId(), 'vid' => $featured_video->id))) ?>
">Nauč se</a> zdarma skoro cokoliv.</h1>
			<p>
				Jsme překlad Khan Academy. Máme pro vás víc než <a href="<?php echo htmlSpecialChars($_control->link(":Front:Homepage:library")) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($count->video, ENT_NOQUOTES) ?>
 videí</a> z matematiky, fyziky a třeba i dějepisu a medicíny. Matematiku si navíc můžete prozkoušet na cvičeních, které najdete vedle samotných lekcí. Pro učitele máme <a href="<?php echo htmlSpecialChars($_control->link(":Coach:Dashboard:")) ?>
">nástroje</a> pro zadávání úkolů a sledování výsledků.
			</p>
			<p>
				<a href="<?php echo htmlSpecialChars($_control->link(":Front:About:")) ?>">Snažíme se</a> učit to, co vás zajímá.
			</p>
			<div class="call-to-action">
<?php if (!$user->loggedIn): ?>				<a class="button blue" href="<?php echo htmlSpecialChars($_control->link(":Front:Registration:")) ?>
">Registrace</a>
<?php endif ?>
			</div>
			<p>
				Naším hlavním <a href="<?php echo htmlSpecialChars($_control->link(":Front:About:sponsors")) ?>
">partnerem</a> je společnost <a href="http://scio.cz/" target="_blank">Scio</a>.
			</p>

<?php Nette\Latte\Macros\CoreMacros::includeTemplate('_darujme.latte', $template->getParameters(), $_l->templates['17676ahwk7'])->render() ?>
		</div>
	</div>
</article>
<?php
}}

//
// block category_link
//
if (!function_exists($_l->blocks['category_link'][] = '_lb64e8f1b458_category_link')) { function _lb64e8f1b458_category_link($_l, $_args) { extract($_args)
;if ($category->isLeaf() && !$category->hasContent()): elseif ($category->isLeaf() && $entity = $category->getFirstContent()): if ($entity instanceof \Entity\Video): ?>
							<a class="block category-<?php echo htmlSpecialChars($category->id) ?>" href="<?php echo htmlSpecialChars($_control->link(":Front:Watch:", array('id' => $category->id, 'vid' => $entity->id))) ?>
">
								<?php if ($category->containsDubbedVideos()): ?><i class="icon-dubbed"></i>&nbsp;<?php endif ;echo Nette\Templating\Helpers::escapeHtml($category->label, ENT_NOQUOTES) ?>

							</a>
<?php else: ?>
							<a class="block category-<?php echo htmlSpecialChars($category->id) ?>" href="<?php echo htmlSpecialChars($_control->link(":Front:Exercise:", array('id' => $category->id, 'eid' => $entity->id))) ?>
">
								<?php if ($category->containsDubbedVideos()): ?><i class="icon-dubbed"></i>&nbsp;<?php endif ;echo Nette\Templating\Helpers::escapeHtml($category->label, ENT_NOQUOTES) ?>

							</a>
<?php endif ;else: ?>
						<a class="block category-<?php echo htmlSpecialChars($category->id) ?>" href="<?php echo htmlSpecialChars($_control->link(":Front:Browse:", array('id' => $category->id))) ?>
">
							<?php if ($category->containsDubbedVideos()): ?><i class="icon-dubbed"></i>&nbsp;<?php endif ;echo Nette\Templating\Helpers::escapeHtml($category->label, ENT_NOQUOTES) ?>

						</a>
<?php endif ;
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
$description = "Jsme překlad Khan Academy. Máme $count->video lekcí z matematiky, fyziky i humanitních věd a dalších. Přes $count->dubbed videí je nadabováno." ;if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars()) ; call_user_func(reset($_l->blocks['scripts-ajax']), $_l, get_defined_vars())  ?>

<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 