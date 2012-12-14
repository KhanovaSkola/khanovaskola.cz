var sub_ticker = null;
var center = null;
var $high = null;

$(function() {
	$('.time').click(function(e) {
		player.seekTo($(this).parent().data('start'));
		e.stopPropagation();
		return false;
	})
})

onPlayerStateChangeCallbacks.push(function(code) {
	if (code == 1) { // playing
		if ($high == null) {
			$high = $("#subtitles div:first");
			$high.addClass("highlight");
		}

		sub_ticker = setInterval(function() {
			moveSubtitles(player.getCurrentTime());
		}, 500);

	} else if (code == -1) { // created
		window.scroll(0, 3000); // scroll to end so the subtitles are visible
		/** prepare scroll helpers */
		$("#subtitles div").each(function(i, el) {
			$(el).data('scroll-to', $(el).position().top - $("#subtitles").position().top);
		});
		center = $("#subtitles").height() * 1/3; // position to scroll subtitles to

	} else {
		clearInterval(sub_ticker);
	}
});

function moveSubtitles(time) {
	if ($high.data('end') >= time) {
		return false;
	}

	$high.removeClass("highlight");
	while ($high.data('end') < time) {
		$high = $high.next();
	}
	$high.addClass("highlight");
	$("#subtitles").scrollTop($high.data('scroll-to') - center);
}
