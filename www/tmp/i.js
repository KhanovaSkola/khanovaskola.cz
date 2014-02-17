// load jquery
    var s = document.createElement('script');
    var c = document.getElementsByTagName('script')[0];
    s.type = 'text/javascript';
    s.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';
    c.parentNode.insertBefore(s, c);

//console.log(document.cookie);
$(function() {
	$('input[type="checkbox"]').hide();
});
