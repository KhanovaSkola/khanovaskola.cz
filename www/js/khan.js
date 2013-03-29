
/** hide _fid */
if(window.history.replaceState){l=window.location.toString();u=l.indexOf('_fid=');if(u!=-1){u=l.substr(0,u)+l.substr(u+10);if(u.substr(u.length-1)=='?'||u.substr(u.length-1)=='&')u=u.substr(0,u.length-1);window.history.replaceState('',document.title,u)}}

Nette.addError = function(elem, message) {
	if (elem.focus) {
		elem.focus();
	}
	if (message) {
		var id = $(elem).closest('form').data('errors');
		var $node = $(id);
		if (id && $node) {
			$node.text(message);

		} else {
			alert(message);
		}
	}
};

if (typeof console == "undefined") {
    window.console = {
        log: function() {},
        info: function() {},
        error: function() {},
        warn: function() {},
    };
}

var dropdownIsOpened = false;
function openDropdown() {
	dropdownIsOpened = true;
	$("header .dropdown-trigger").addClass('hover');
	$("header .dropdown").addClass('open');
}

function closeDropdown() {
	$("header .dropdown-trigger").removeClass('hover');
	$("header .dropdown").removeClass('open');
	$("header .dropdown li").removeClass('hover');
	dropdownIsOpened = false;
}

$(function() {
	/** highlight anchor if in correct format */
	if (location.hash.indexOf('#hl-') === 0) {
		$(location.hash).addClass("anchor-highlight");
	}

	var isMouseOver = false;
	$("header .dropdown-trigger")/*.hover(function() {
		setTimeout(openDropdown, 100);
	})*/.click(function() {
		if (dropdownIsOpened) {
			closeDropdown();
		} else {
			openDropdown();
		}
		return false;
	});

	$("body").click(function(e) {
		closeDropdown();
	});
	$("header .dropdown").click(function(e) {
		e.stopPropagation();
	});
	$("header .dropdown").menuAim({
	     activate: function(row) {
	     	$(row).addClass('hover');
	     },
	     deactivate: function(row) {
	     	$(row).removeClass('hover');
	     },
	     rowSelector: "> li.expandable",
	     submenuSelector: "*",
	     submenuDirection: "right"
	 });

	//console.info('Ahoj,\n\nočividně tě zajímá, jak funguje Khanova škola uvnitř. Nechceš s námi spolupracovat?\nNapiš nám na dev@khanovaskola.cz.\n\nS pozdravem,\nMikuláš Dítě');
});
