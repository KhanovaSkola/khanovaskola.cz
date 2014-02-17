<?php //netteCache[01]000408a:2:{s:4:"time";s:21:"0.07078900 1392483784";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:88:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/components/Subtitles/template.latte";i:2;i:1392295174;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/components/Subtitles/template.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'bfacnj95rq')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if (!$subtitles && !$dubbed): ?><div>
	<p style="text-align: center; margin-top: 1ex;">Omlouváme se, titulky jsou dočasně nedostupné. Zkuste prosím tuto stránku obnovit později.
</div>
<?php endif ?>
<div id="subtitles-overlay">&nbsp; 
</div>
<?php if ($subtitles): ?><div id="subtitles">
	<table>
		<tr>
			<td>
<?php $iterations = 0; foreach ($subtitles as $row): ?>				<div class="line row" data-start="<?php echo htmlSpecialChars($row->start_time / 1000) ?>
" data-end="<?php echo htmlSpecialChars($row->end_time / 1000) ?>">
					<?php echo Nette\Templating\Helpers::escapeHtml($row->text, ENT_NOQUOTES) ?>

				</div>
<?php $iterations++; endforeach ?>
			</td>
			<td class="narrow">
<?php $iterations = 0; foreach ($subtitles as $row): ?>				<div class="row" data-start="<?php echo htmlSpecialChars($row->start_time / 1000) ?>">
					<a href="#" class="time"><?php echo Nette\Templating\Helpers::escapeHtml($template->time($row->start_time / 1000), ENT_NOQUOTES) ?></a>
				</div>
<?php $iterations++; endforeach ?>
			</td>
		</tr>
	</table>
</div>
<?php endif ;