$(function() {
	var timeout = 300;
	
	var menu = 0;
	$('.dropdown-toggle').mouseenter(function() {
		menu++;
		$('.topic-browser-dropdown').addClass('open');
	});
	$('.topic-browser-dropdown').mouseleave(function() {
		hideMenu(menu);
	});
	
	$('.dropdown-menu li.level0').mouseenter(function() {
		$('.dropdown-menu li.has-submenu').removeClass('hover-active');
	});
	$('.dropdown-menu > li.has-submenu').mouseenter(function() {
		$(this).addClass('hover-active');
	});
	
	function hideMenu(state) {
		setTimeout(function() {
			if (state === menu) {
				$('.topic-browser-dropdown').removeClass('open');
			}
		}, timeout);
	}
});
