<?php

header('HTTP/1.1 503 Service Unavailable');
header('Retry-After: 300'); // 5 minutes in seconds

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Probíhají úpravy &ndash; Khanova škola</title>

	<link rel="stylesheet" media="screen,projection,tv" href="/css/khan.css?v=1344333654" type="text/css" />
	<link rel="stylesheet" media="screen,projection,tv" href="/css/screen.css?v=1344333654" type="text/css" />

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes=”72x72″ href="/images/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes=”144x144″ href="/images/apple-touch-icon@2x.png" />

	<meta name="robots" content="noindex">

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-33892654-1']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>
<body>
	<script> document.body.className+=' js' </script>

	<div id="outer-wrapper" class="clearfix">
		<div class="notification-bar" style="display:none;"></div>
		<div class="notification-bar-spacer"></div>
		<div id="page-container">
			<div id="page-container-inner">
				<div id="goals-nav-container" style="display: none" class="ui-corner-bottom"></div>
				<header>

<div id="top-header">
	<div id="logo">
		<a id="logo-image" href="/" title="Zpět na titulku!" data-tag="Header">
			<img src="/images/header.png" />
		</a>
	</div>
	<div class="clear"></div>
</div>
				</header>

<article>


<div class="col1 forty-sixty" style="text-align: center; padding-top: 18px; min-width:160px; max-width:160px; margin-right: 2%;">
	<img id="about-vertical-logo" src="/images/khan-logo-vertical-transparent.png" height=170 width=125 />
</div>
<div class="col2 forty-sixty" style="max-width:81%; text-align: justify;">
	<h2 class="main-headline" style="white-space: pre;">Probíhá úprava webu.</h2>
	<p>Vylepšujeme a opravujeme tento web, vraťte se prosím na tyto stránky za několik minut. Omlouváme se za nepříjemnosti.</p>
	<p><a href="<?php echo $_SERVER['REQUEST_URI']; ?>" class="call-to-action simple-button green">Obnovit stánku</a></p>
</div>
<div class="clear"></div>

</article>

				<div id="end-of-page-spacer" style="height: 38px;">&nbsp;</div>

			</div>
		</div>
	</div>
	<div class="push"></div>

	<footer id="footer" class="short">
		<div id="leaves">
			<div class="inner">
				<div id="copyright" class="tiny">
					<small>
						&copy; Khan Academy&reg; 2012, czech version &copy; Mikuláš Dítě 2012
					</small>
					<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/cz/" class="creative-commons">
						<img src="/images/creative_commons.png" />
					</a>
				</div>
				<span class="footer-links">
					<a data-tag="Footer" href="/kontakt/">Kontakt</a>
					<a href="/kontakt/report?url=http%3A%2F%2Fkhan.dite.cz%2Fo-skole%2F&amp;time=1344333654">Nahlásit problém</a>
					<span class="sep">|</span>
					<a id="faq-link" data-tag="Footer" href="/o-skole/">O škole</a>
					<span class="sep">|</span>
					<a title="Pravidla použití" data-tag="Footer"  href="/kontakt/pravidla-pouziti">Pravidla použití</a>
					<a title="Ochrana osobních údajů" data-tag="Footer"  href="/kontakt/osobni-udaje">Osobní údaje</a>

					<span class="sep">|</span>
					<span class="small-social-links">
						<a class="google-analytics-link-track" onclick="_gaq.push(['_trackEvent', 'Click', 'Youtube-Subscribe-Header']);" href="http://www.youtube.com/khanacademycz" title="Youtube">
							<img src="/images/services/youtube.png" />
						</a>
						<a class="google-analytics-link-track" onclick="_gaq.push(['_trackEvent', 'Click', 'Twitter-Follow-Header']);" href="http://twitter.com/khanacademycz" title="Twitter">
							<img src="/images/services/twitter.png" />
						</a>
						<a class="google-analytics-link-track" onclick="_gaq.push(['_trackEvent', 'Click', 'Facebook-Join-Header']);" href="http://www.facebook.com/khanacademycz" title="Facebook">
							<img src="/images/services/facebook.png" />
						</a>
					</span>
				</span>
				<div class="tiny legal">
					<small>
						<span class="legal-english">Khan Academy CZ is a community of passionate volunteers committed to translating Khan Academy content and providing universal access to quality education.</span> Khanova Škola je dobrovolná komunitní práce nezávislá na Khan Academy.
					</small>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
<?php exit();
