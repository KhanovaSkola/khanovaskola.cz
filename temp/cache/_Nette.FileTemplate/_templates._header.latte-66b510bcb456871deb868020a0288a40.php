<?php //netteCache[01]000396a:2:{s:4:"time";s:21:"0.70148600 1392483716";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:76:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/templates/_header.latte";i:2;i:1392295179;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/templates/_header.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'dsip63ra3j')
;
// prolog Nette\Latte\Macros\CacheMacro
Nette\Latte\Macros\CacheMacro::initRuntime($template, $_g);

// prolog Nette\Latte\Macros\UIMacros
//
// block category_link
//
if (!function_exists($_l->blocks['category_link'][] = '_lb1a4e719a27_category_link')) { function _lb1a4e719a27_category_link($_l, $_args) { extract($_args)
;if ($category->isLeaf() && $entity = $category->getFirstContent()): if ($entity instanceof \Entity\Video): ?>
			<a href="<?php echo htmlSpecialChars($_control->link(":Front:Watch:", array('id' => $category->id, 'vid' => $entity->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($subject->label, ENT_NOQUOTES) ?></a>
<?php else: ?>
			<a href="<?php echo htmlSpecialChars($_control->link(":Front:Exercise:", array('id' => $category->id, 'eid' => $entity->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($subject->label, ENT_NOQUOTES) ?></a>
<?php endif ;else: ?>
		<a href="<?php echo htmlSpecialChars($_control->link(":Front:Browse:", array('id' => $category->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($subject->label, ENT_NOQUOTES) ?></a>
<?php endif ;
}}

//
// block _header
//
if (!function_exists($_l->blocks['_header'][] = '_lb9bf3de2509__header')) { function _lb9bf3de2509__header($_l, $_args) { extract($_args); $_control->validateControl('header')
;if ($user->isLoggedIn()): ?>
			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:Profile:", array('pid' => NULL))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($user->entity->name, ENT_NOQUOTES) ?></a></li>
<?php if ($user->isInRole($ROLE::EDITOR)): ?>			<li><a href="<?php echo htmlSpecialChars($_control->link(":Moderator:Dashboard:")) ?>
">Moderátoři</a></li>
<?php endif ?>
			<li><a class="no-ajax" href="<?php echo htmlSpecialChars($_control->link(":Sign:out")) ?>
">Odhlásit se</a></li>
<?php else: ?>
			<li><a href="<?php echo htmlSpecialChars($_control->link(":Sign:in", array('backlink' => $presenter->getBacklink()))) ?>
">Přihlášení</a></li>
			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:Registration:")) ?>
">Registrace</a></li>
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); } ?>
<div class="container">
<?php if (Nette\Latte\Macros\CacheMacro::createCache($netteCacheStorage, '6qcfdb22pv', $_g->caches, array($user->loggedIn, 'tags' => array('categories', 'videos')))) { ?>
		<ul class="float-left">
			<li class="dropdown-trigger"><a href="#" class="no-ajax">Naučit se <i class="icon-arrow-down"></i></a></li>
<?php if ($user->loggedIn): ?>			<li><a href="<?php echo htmlSpecialChars($_control->link(":Coach:Dashboard:")) ?>
">Pro učitele</a></li>
<?php endif ;if (!$user->loggedIn): ?>			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:About:coach")) ?>
">Pro učitele</a></li>
<?php endif ?>
			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:Volunteer:")) ?>
">Dobrovolníci</a></li>
			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:About:")) ?>
">O nás</a></li>

			<ul class="dropdown">
				<li>
					<a href="<?php echo htmlSpecialChars($_control->link(":Front:Homepage:library")) ?>
">Všechen obsah</a>
				</li>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($presenter->context->categories->findRoot()) as $subject): ?>
				<li class="expandable<?php if ($iterator->isFirst()): ?> has-divider<?php endif ?>">
<?php $count = $subject->getSubCategories()->count() ;if ($count === 1): $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($subject->getSubCategories()) as $subcat): call_user_func(reset($_l->blocks['category_link']), $_l, array('category' => $subcat, 'subject' => $subject) + get_defined_vars()) ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;elseif ($count > 1): ?>
						<a href="#" class="has-submenu"><?php echo Nette\Templating\Helpers::escapeHtml($subject->label, ENT_NOQUOTES) ?></a>
						<ul>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($subject->getSubCategories()) as $subcat): if ($subcat->hasContent()): ?>							<li>
<?php call_user_func(reset($_l->blocks['category_link']), $_l, array('category' => $subcat, 'subject' => $subcat) + get_defined_vars()) ?>
							</li>
<?php endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
						</ul>
<?php endif ?>
				</li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;$iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($presenter->context->tags->findBy(array('display' => TRUE))) as $tag): ?>
				<li<?php if ($iterator->isFirst()): ?> class="has-divider"<?php endif ?>>
					<a href="<?php echo htmlSpecialChars($_control->link(":Front:Tag:", array('tid' => $tag->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($tag->label, ENT_NOQUOTES) ?></a>
				</li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			</ul>
		</ul>
<?php $_l->tmp = array_pop($_g->caches); if (!$_l->tmp instanceof stdClass) $_l->tmp->end(); } ?>

	<div class="logo">
		<a href="<?php echo htmlSpecialChars($_control->link(":Front:Homepage:")) ?>">
			<img src="<?php echo htmlSpecialChars($cdnUrl) ?>/images/header_white.svg" width="215px" height="38px" />
		</a>
		<div id="spinner" class="animate-spin hidden">
			<i class="icon-spinner"></i>
		</div>
	</div>
	<ul class="float-right"<?php echo ' id="' . $_control->getSnippetId('header') . '"' ?>>
<?php call_user_func(reset($_l->blocks['_header']), $_l, $template->getParameters()) ?>
	</ul>
</div>
