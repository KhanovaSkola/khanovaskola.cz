<?php //netteCache[01]000418a:2:{s:4:"time";s:21:"0.99868800 1392483717";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:98:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/FrontModule/templates/Homepage/_darujme.latte";i:2;i:1392295176;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/FrontModule/templates/Homepage/_darujme.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'rgvkzb4fa1')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<style type="text/css">

.darujme_widget_body {
margin:0 auto;
overflow: hidden;
vertical-align: middle;
}

.darujme_widget_content {
padding-top: 15px;
padding-bottom: 15px;
}

.darujme_widget_caption {
text-align: center;
color: #000000;
font-size: 13px;
line-height: 120%;
}

.darujme_widget_project {
text-align: center;
padding-top: 7px;
}

.darujme_widget_input {
font: 12px/18px 'Helvetica Neue', Helvetica, Arial, 'Liberation Sans',
FreeSans, sans-serif;
width: 80px !important;
display: inline;
}

.darujme_widget_custom_amount {
text-align: center;
padding-top: 7px;
}

.darujme_widget_buttons {
text-align: center;
padding-top: 7px;
}

.darujme_widget_button {
	/*font-size: inherit;*/
}

.darujme_widget_submit {
text-align: center;
padding-top: 7px;
}

.darujme_widget_footer {
text-align: center;
margin-top: -5px;
}
form.darujme {
	width:330px; height:250px; overflow: hidden; border: 1px solid #ddd; margin-top: 2ex;
	background-color: #F7F7F7;
}
</style>
<form id="form_widget_instance" class="darujme" method="get" action="https://www.darujme.cz/index.php" target="_parent">
	<div class="darujme_widget_body">
		<div class="darujme_widget_content">
			<input type="hidden" name="client" value="17071301" />
			<input type="hidden" name="page" value="checkout" />
			<input type="hidden" name="currency" value="CZK" />
			<input type="hidden" name="language" value="cz" />                
			<div class="darujme_widget_caption">
				Přispějte prosím na rozvoj Khanovy školy. Všichni naši pracovníci jsou dobrovolníci a Váš dar využijeme na podporu překladu a tvorbu nových videí.
			</div>

			<input type="hidden" name="project" value="69673214" />

			<div class="darujme_widget_buttons">
				<input type="submit" class="darujme_widget_button button blue" onclick="document.getElementById ('darujme_widget_qty').value = '100'; return true;" value="100 Kč" />
				<input type="submit" class="darujme_widget_button button blue" onclick="document.getElementById ('darujme_widget_qty').value = '500'; return true;" value="500 Kč" />
			</div>


			<div class="darujme_widget_custom_amount">
			nebo <input type="text" id="darujme_widget_qty" name="ammount" size="5" class="darujme_widget_input" /> ,- Kč        </div>

			<div class="darujme_widget_submit">
				<input type="submit" class="darujme_widget_button button blue" value="Darovací formulář" />
			</div>

			<div class="darujme_widget_footer">
				<a href="http://www.darujme.cz" target="_blank">
					<img src="https://www.darujme.cz/dar/images/nadace/logo_darujme_cz.png" alt="logo darujme" style="border: none; padding-top: 15px; margin-bottom: 10px;" />
				</a>
			</div>
		</div>
	</div>
</form>
