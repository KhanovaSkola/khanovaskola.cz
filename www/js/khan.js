
/** hide _fid */
if(window.history.replaceState){l=window.location.toString();u=l.indexOf('_fid=');if(u!=-1){u=l.substr(0,u)+l.substr(u+10);if(u.substr(u.length-1)=='?'||u.substr(u.length-1)=='&')u=u.substr(0,u.length-1);window.history.replaceState('',document.title,u)}}

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
