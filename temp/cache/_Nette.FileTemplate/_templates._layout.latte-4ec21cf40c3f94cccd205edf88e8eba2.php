<?php //netteCache[01]000396a:2:{s:4:"time";s:21:"0.64296500 1392483716";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:76:"/Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/templates/@layout.latte";i:2;i:1392295179;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/mikulas/Box Sync/Projects/khanovaskola.cz/app/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '6n7rdvf3q4')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block _title
//
if (!function_exists($_l->blocks['_title'][] = '_lbbcba2ce551__title')) { function _lbbcba2ce551__title($_l, $_args) { extract($_args); $_control->validateControl('title')
?><title><?php if (isset($title)): echo Nette\Templating\Helpers::escapeHtml($title, ENT_NOQUOTES) ?>
 &ndash; <?php endif ?>Khanova škola</title><?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb39f80c076b_head')) { function _lb39f80c076b_head($_l, $_args) { extract($_args)
;
}}

//
// block _content
//
if (!function_exists($_l->blocks['_content'][] = '_lbe4b42f7a0a__content')) { function _lbe4b42f7a0a__content($_l, $_args) { extract($_args); $_control->validateControl('content')
?>		<?php if (isset($_l->blocks["navigation"])): Nette\Latte\Macros\UIMacros::callBlock($_l, 'navigation', $template->getParameters()) ;endif ?>

<?php $iterations = 0; foreach ($flashes as $flash): ?>		<div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ;Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb3c561e6582_scripts')) { function _lb3c561e6582_scripts($_l, $_args) { extract($_args)
;
}}

//
// block _scripts
//
if (!function_exists($_l->blocks['_scripts'][] = '_lb6a791d473d__scripts')) { function _lb6a791d473d__scripts($_l, $_args) { extract($_args); $_control->validateControl('scripts')
?>		<?php call_user_func(reset($_l->blocks['scripts-ajax']), $_l, get_defined_vars())  ?>

<?php
}}

//
// block scripts-ajax
//
if (!function_exists($_l->blocks['scripts-ajax'][] = '_lb35358afe19_scripts_ajax')) { function _lb35358afe19_scripts_ajax($_l, $_args) { extract($_args)
;
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
?>
<!DOCTYPE html>
<html lang="cs"<?php if (isset($data_require)): ?> data-require=<?php echo '"' . htmlSpecialChars($data_require) . '"' ;endif ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width" />

	<?php echo $newrelic->header ?>


	<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); } ?>
<div id="<?php echo $_control->getSnippetId('title') ?>"><?php call_user_func(reset($_l->blocks['_title']), $_l, $template->getParameters()) ?>
</div>

<?php if (isset($description)): ?>	<meta name="description" content="<?php echo htmlSpecialChars($description) ?>" />
<?php endif ;if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>
	<link rel="alternate" type="application/rss+xml" title="Khanova škola - Blog"  href="<?php echo htmlSpecialChars($_control->link("//:Front:Blog:rss")) ?>
"/>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($cdnUrl) ?>
/css/compiled/screen.v-<?php echo htmlSpecialChars(md5_file(WWW_DIR . '/css/compiled/screen.css')) ?>.css" type="text/css" />
	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($cdnUrl) ?>/css/chosen.css" type="text/css" />
<?php if ($user->loggedIn): ?>	<link rel="stylesheet" media="screen,projection,tv" type="text/css"  href="<?php echo htmlSpecialChars($_control->link(":Front:DynamicCss:", array('v' => $dynamic_css_hash))) ?>
"/>
<?php endif ?>

	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($cdnUrl) ?>/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?php echo htmlSpecialChars($cdnUrl) ?>/images/apple/apple-touch-icon-57.png" /> 
	<link rel="apple-touch-icon-precomposed" href="<?php echo htmlSpecialChars($cdnUrl) ?>/images/apple/apple-touch-icon-57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo htmlSpecialChars($cdnUrl) ?>/images/apple/apple-touch-icon-72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo htmlSpecialChars($cdnUrl) ?>/images/apple/apple-touch-icon-114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo htmlSpecialChars($cdnUrl) ?>/images/apple/apple-touch-icon-144.png" />

	<link rel="search" type="application/opensearchdescription+xml" title="Khanova škola"  href="<?php echo htmlSpecialChars($_control->link("//:Static:opensearch")) ?>
"/>

	<link rel="canonical"  href="<?php echo htmlSpecialChars($_control->link("//this", array('autoplay' => NULL, 'ref' => NULL))) ?>
"/>

		<meta property="og:site_name" content="Khanova škola" />
	<meta property="og:url" content="<?php echo htmlSpecialChars($_control->link("//this", array('autoplay' => NULL))) ?>" />
	<meta property="og:title" content="<?php if (isset($title)): echo htmlSpecialChars($title) ?>
 &ndash; <?php endif ?>Khanova škola" />
<?php if (isset($description)): ?>	<meta property="og:description" content="<?php echo htmlSpecialChars($description) ?>" />
<?php endif ?>
	<meta property="og:image" content="<?php echo htmlSpecialChars($baseUrl) ?>/images/hand-tree-opengraph-256.png" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="cs_CZ" />
	<meta property="fb:app_id" content="273608052753035" />

		<meta name="application-name" content="Khanova škola" />
	<meta name="msapplication-tooltip" content="Naučná videa zdarma." />
	<meta name="msapplication-navbutton-color" content="#9db63b" />
	<meta name="msapplication-starturl" content="/" />
	<meta name="msapplication-task" content="name=Knihovna; action-uri=/knihovna; icon-uri=<?php echo htmlSpecialChars($cdnUrl) ?>/favicon.ico" />
	<meta name="msapplication-task" content="name=Cvičení; action-uri=/cviceni; icon-uri=<?php echo htmlSpecialChars($cdnUrl) ?>/favicon.ico" />
	<meta name="msapplication-TileColor" content="#9db63b" />
	<meta name="msapplication-TileImage" content="<?php echo htmlSpecialChars($cdnUrl) ?>/images/apple/apple-touch-icon-144.png" />
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>


	<script>
		var onLoadQueue = [];
		var onLoadQueuePersistent = [];
		/** error logging */
		var errorSent = false;
		window.onerror = function(errorMessage, url, line) {
			if (errorSent) {
				return false;
			}
			errorSent = true;
			var parameters = "?description=" + escape(errorMessage)
				+ "&url=" + escape(url)
				+ "&line=" + escape(line)
				+ "&parent_url=" + escape(document.location.href)
				+ "&user_agent=" + escape(navigator.userAgent)
				+ "&user_id=<?php echo Nette\Templating\Helpers::escapeJs($user->id) ?>";
			/** Send error to server */
			new Image().src = "/jsLogger/" + parameters;
		};
	</script>
</head>
<body>
	<header>
<?php Nette\Latte\Macros\CoreMacros::includeTemplate("_header.latte", $template->getParameters(), $_l->templates['6n7rdvf3q4'])->render() ?>
	</header>
		<div class="content container"<?php echo ' id="' . $_control->getSnippetId('content') . '"' ?>>
<?php call_user_func(reset($_l->blocks['_content']), $_l, $template->getParameters()) ?>
	</div>

	<footer>
		<div class="container">
			<div class="col1">
				<ul>
					<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:Contact:")) ?>
">Kontakt</a></li>
					<li><a rel="nofollow" href="<?php echo htmlSpecialChars($_control->link(":Front:Contact:report", array('url' => $presenter->url, 'time' => time()))) ?>
">Nahlásit problém</a></li>
				</ul>
				<ul>
					<li><a title="Podmínky použití" href="<?php echo htmlSpecialChars($_control->link(":Front:Contact:tos")) ?>
">Podmínky použití</a></li>
					<li><a title="Blog Khanovy školy" href="<?php echo htmlSpecialChars($_control->link("//:Front:Blog:rss")) ?>
">RSS feed</a></li>
					<li><a title="Materiály pro tisk" href="<?php echo htmlSpecialChars($_control->link(":Front:About:press")) ?>
">Pro média</a></li>
				</ul>
				<ul>
					<li><a id="faq-link" href="<?php echo htmlSpecialChars($_control->link(":Front:About:")) ?>
">O škole</a></li>
				</ul>
				<ul>
					<li>Sociální sítě</li>
					<li>
						<a class="no-ajax" onclick="_gaq.push(['_trackEvent', 'Click', 'Youtube-Subscribe-Header']);" href="http://www.youtube.com/khanacademyczech" title="Youtube" target="_blank">
							<img src="<?php echo htmlSpecialChars($cdnUrl) ?>/images/icon_youtube.svg" height="24" alt="Náš youtube kanál, na který nahráváme všechna dabovaná videa" />
						</a>
						<a class="no-ajax" onclick="_gaq.push(['_trackEvent', 'Click', 'Gplus-Follow-Header']);" href="https://plus.google.com/117423506408066949300/posts" title="Google Plus" target="_blank">
							<img src="<?php echo htmlSpecialChars($cdnUrl) ?>/images/icon_gplus.svg" height="24" alt="Google Plus stránka Khanovy školy" />
						</a>
						<a class="no-ajax" onclick="_gaq.push(['_trackEvent', 'Click', 'Facebook-Join-Header']);" href="http://www.facebook.com/khanovaskola" title="Facebook" target="_blank">
							<img src="<?php echo htmlSpecialChars($cdnUrl) ?>/images/icon_facebook.svg" height="24" alt="Facebook stránka Khanovy školy" />
						</a>
						<a class="no-ajax" onclick="_gaq.push(['_trackEvent', 'Click', 'Twitter-Follow-Header']);" href="https://twitter.com/khanovaskola" title="Twitter" target="_blank">
							<img src="<?php echo htmlSpecialChars($cdnUrl) ?>/images/icon_twitter.svg" height="24" alt="Twitter účet Khanovy školy obsahující nejdůležitější novinky" />
						</a>
					</li>
				</ul>
			</div>
			<div class="col2">
				<ul itemprop="version">
					<li><?php echo Nette\Templating\Helpers::escapeHtml($git_deploy->branch, ENT_NOQUOTES) ?>
: <a href="https://github.com/KhanovaSkola/khanovaskola.cz/commit/<?php echo htmlSpecialChars($git_deploy->hash) ?>
" target="_blank" rel="nofollow"><?php echo Nette\Templating\Helpers::escapeHtml($git_deploy->hash, ENT_NOQUOTES) ?></a></li>
					<li><?php echo Nette\Templating\Helpers::escapeHtml($template->date($git_deploy->time, 'Y-n-j H:i'), ENT_NOQUOTES) ?></li>
				</ul>
				<div class="legal">
					<a class="no-ajax" rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/cz/">
						<img src="<?php echo htmlSpecialChars($cdnUrl) ?>/images/creative_commons.svg" height="15" alt="Uveďte autora-Nevyužívejte dílo komerčně-Zachovejte licenci 3.0 Česko (CC BY-NC-SA 3.0 CZ)" />
					</a>
					<div>&copy; <span itemprop="copyrightHolder">Mikuláš Dítě</span> <span itemprop="copyrightYear"><?php echo Nette\Templating\Helpers::escapeHtml(date('Y'), ENT_NOQUOTES) ?></span></div>
					<div>&copy; <span itemprop="copyrightHolder">Khan Academy</span>&reg; (original resources) <span itemprop="copyrightYear"><?php echo Nette\Templating\Helpers::escapeHtml(date('Y'), ENT_NOQUOTES) ?></span></div>
					<div>Khan Academy CZ is a community of passionate volunteers committed to translating Khan Academy content and providing universal access to quality education.</div>
					<div>Khanova Škola je dobrovolná komunitní práce nezávislá na Khan Academy.</div>
				</div>
			</div>
			<div class="col3">
				<img class="logo" src="<?php echo htmlSpecialChars($cdnUrl) ?>/images/footer_logo.svg" width="100px" />
			</div>
		</div>
	</footer>

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-33892654-1']);
		_gaq.push(['_trackPageview']);
		_gaq.push(['_setCustomVar', 1, 'Logged in', <?php echo Nette\Templating\Helpers::escapeJs($user->loggedIn ? 'Yes' : 'No') ?>, 2]);
		_gaq.push(['_setCustomVar', 1, 'Device pixel ratio', ""+window.devicePixelRatio, 1]);
		<?php if ($user->loggedIn): ?>_gaq.push(['_setCustomVar', 1, 'User ID', '<?php echo Nette\Templating\Helpers::escapeJs($user->id) ?>
', 1]);<?php endif ?>

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<script type="text/javascript">
		WebFontConfig = { fontdeck: { id: '31422' } };
		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
			'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo Nette\Templating\Helpers::escapeJs($cdnUrl) ?>/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script>window.jQuery.ui || document.write('<script src="<?php echo Nette\Templating\Helpers::escapeJs($cdnUrl) ?>/js/vendor/jquery-ui-1.10.2.min.js"><\/script>')</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.1.1/jquery-migrate.min.js"></script>
	<script src="<?php echo htmlSpecialChars($cdnUrl) ?>/js/jquery.menu-aim.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($cdnUrl) ?>/js/netteForms.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($cdnUrl) ?>/js/nette.ajax.v-<?php echo htmlSpecialChars(md5_file(WWW_DIR . '/js/nette.ajax.js')) ?>.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($cdnUrl) ?>/js/history.ajax.v-<?php echo htmlSpecialChars(md5_file(WWW_DIR . '/js/history.ajax.js')) ?>.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($cdnUrl) ?>/js/khan.v-<?php echo htmlSpecialChars(md5_file(WWW_DIR . '/js/khan.js')) ?>.js"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($cdnUrl) ?>/js/chosen.jquery.min.js"></script>

			<script>
			var youtubeReady = false;
			function onYouTubeIframeAPIReady() {
				youtubeReady = true;
				if (typeof video_id === "undefined")
					return false;

				showVideo();
			}
			function showVideo() {
				var height = 480;
				var width = 800;

				player = new YT.Player('player', {
					height: height,
					width: width,
					html5: true,
					wmode: "transparent",
					playerVars: {
						autoplay: youtube_autoplay,
						showinfo: 0,
						wmode: "transparent"
					},
					videoId: youtube_video_id,
					events: {
						'onStateChange': onPlayerStateChange
					}
				});
			}

			var player = null;
			var ticker = null;

			var tag = document.createElement('script');
			tag.src = "https://www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			var done = false;
			var onPlayerStateChangeCallbacks = [];
			function onPlayerStateChange(event) {
				for (i = 0; i < onPlayerStateChangeCallbacks.length; ++i) {
					onPlayerStateChangeCallbacks[i](event.data);
				}
			}

			onPlayerStateChangeCallbacks.push(fireGAEvent);
			function fireGAEvent(code) {
				if (code == 0) {
					_gaq.push(['_trackEvent', 'Video', 'Video-Watched', video_id]);
				}
			}

			onPlayerStateChangeCallbacks.push(saveState);
			function saveState(code) {
				if (code == 1) {
					ticker = setInterval(function() {
						updateProgress(player.getCurrentTime());
					}, 10000);
				} else {
					clearInterval(ticker);
				}

				if (code == 0) { // save only if video ended
					updateProgress(-1);
				}
			}

			function updateProgress(progress) {
				if (typeof youtube_progress_url === 'undefined') {
					return false;
				}

				$.ajax(youtube_progress_url, {
					data: { seconds: progress},
					success: function(response) {
						if (response.status !== 'success') {
							console.error("Error while saving progress: ", response);
						}
					}
				});
			}
		</script>
		<script type="text/javascript" src="<?php echo htmlSpecialChars($cdnUrl) ?>/js/subtitles.v-<?php echo htmlSpecialChars(md5_file(WWW_DIR . '/js/subtitles.js')) ?>.js"></script>

		<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>

<div id="<?php echo $_control->getSnippetId('scripts') ?>"><?php call_user_func(reset($_l->blocks['_scripts']), $_l, $template->getParameters()) ?>
</div>	<?php echo $newrelic->footer ?>

</body>
</html>
