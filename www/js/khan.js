$(function() {
	var timeout = 300;
	
	/** ######### main dropdown #########  */
	
	var menu = 0;
	$('.nav-subheader .dropdown-toggle').mouseenter(function() {
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
	

	/** ######### user dropdown #########  */

	var usermenu = 0;
	$('#user-info .dropdown-toggle').mouseenter(function() {
		usermenu++;
		$('#user-info .dropdown').addClass('open');
	});
	$('#user-info .dropdown').mouseleave(function() {
		hideUserMenu(usermenu);
	});
	
	function hideUserMenu(state) {
		setTimeout(function() {
			if (state === usermenu) {
				$('#user-info .dropdown').removeClass('open');
			}
		}, timeout);
	}
});
