<?php //netteCache[01]000406a:2:{s:4:"time";s:21:"0.76390000 1392483783";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:86:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/FrontModule/templates/_leaf.latte";i:2;i:1392295175;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/FrontModule/templates/_leaf.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '0cv3fakhrr')
;
// prolog Nette\Latte\Macros\CacheMacro
Nette\Latte\Macros\CacheMacro::initRuntime($template, $_g);

// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<style>
	<?php if (isset($video)): $node = "#video-$video->id" ;endif ?>

	<?php if (isset($exercise)): $node = "#exercise-$exercise->id" ;endif ?>

<?php if (isset($node)): ?>
		<?php echo $node ?> { background-color: #707b8b}
		<?php echo $node ?> a { color: white}
<?php endif ?>
</style>
<?php if ($user->isInRole($ROLE::ADDER) || $user->isInRole($ROLE::EDITOR)): ?><div style="margin-bottom: 2ex">
<?php if ($user->isInRole($ROLE::ADDER)): ?>	<a class="button blue" href="<?php echo htmlSpecialChars($_control->link("add")) ?>
">přidat video</a>
<?php endif ;if ($user->isInRole($ROLE::EDITOR)): ?>	<a class="button blue" href="<?php echo htmlSpecialChars($_control->link(":Front:Browse:sort", array('id' => $category->id))) ?>
">upravit pořadí</a>
<?php endif ?>
</div>
<?php endif ?>

<?php $verifier = $user->isInRole($ROLE::VERIFIER) ? 1 : 0 ;if (Nette\Latte\Macros\CacheMacro::createCache($netteCacheStorage, 'ux9jvw72ty', $_g->caches, array("$category->id|$verifier", 'tags' => array("category/$category->id", $verifier ? "verifier/category/$category->id" : "hackystring")))) { ?>
	<div class="categories entities">
		<ol class="parents">
<?php $parent = $category->getParent() ;$parent2 = $parent ? $parent->getParent():null ;$parent3 = $parent2 ? $parent2->getParent():null ;if ($parent3): ?>
			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:Browse:", array('id' => $parent3->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($parent3->label, ENT_NOQUOTES) ?></a></li>
<?php endif ;if ($parent2): ?>			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:Browse:", array('id' => $parent2->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($parent2->label, ENT_NOQUOTES) ?></a></li>
<?php endif ;if ($parent): ?>			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:Browse:", array('id' => $parent->id))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($parent->label, ENT_NOQUOTES) ?></a></li>
<?php endif ?>
			<li><span><?php echo Nette\Templating\Helpers::escapeHtml($category->label, ENT_NOQUOTES) ?>:</span></li>
		</ol>
		<ol class="path">
<?php $iterations = 0; foreach ($category->getContent() as $entity): if ($entity instanceof \Entity\Video): $vs = count($entity->getVerifications()) ?>
				<li id="video-<?php echo htmlSpecialChars($entity->id) ?>" data-type="video" data-id="<?php echo htmlSpecialChars($entity->id) ?>
" <?php if ($verifier): ?>class="video-verifications-<?php echo htmlSpecialChars($vs >= 2 ? 2 : $vs == 1 ? 1 : 0) ?>
"<?php endif ?>>
					<span class="path-route"></span>
					<a href="<?php echo htmlSpecialChars($_control->link(":Front:Watch:", array('id' => $category->id, 'vid' => $entity->id))) ?>
">
						<i<?php if ($_l->tmp = array_filter(array('icon-video', 'v-'.$entity->id, $entity->isDubbed() ? 'icon-dubbed':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>></i>
						<?php echo Nette\Templating\Helpers::escapeHtml($entity->label, ENT_NOQUOTES) ?>

					</a>
				</li>
<?php else: ?>
				<li id="exercise-<?php echo htmlSpecialChars($entity->id) ?>" data-type="exercise" data-id="<?php echo htmlSpecialChars($entity->id) ?>">
					<span class="path-route"></span>
					<a class="no-ajax" href="<?php echo htmlSpecialChars($_control->link(":Front:Exercise:", array('id' => $category->id, 'eid' => $entity->id))) ?>
">
						<i class="icon-exercise"></i>
						<?php echo Nette\Templating\Helpers::escapeHtml($entity->label, ENT_NOQUOTES) ?>

					</a>
				</li>
<?php endif ;$iterations++; endforeach ?>		</ol>
	</div><?php $_l->tmp = array_pop($_g->caches); if (!$_l->tmp instanceof stdClass) $_l->tmp->end(); } 