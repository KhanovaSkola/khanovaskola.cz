var sub_ticker = null;
var center = null;
var $high = null;

onLoadQueuePersistent.push(function() {
	if (!$("#player").length || !$("#subtitles").length)
		return false;

	if ($(".entity").data('format') === 'dubbed') {
		$("#subtitles-overlay").hide();
		return false;
	}

    console.log('subtitles init');
	var coords = $("#player").offset();
	coords.top += 480 - 2 * $("#subtitles-overlay").height() - 70;
	$("#subtitles-overlay").offset(coords);

	$('.time').click(function(e) {
		var time = $(this).parent().data('start');
		player.seekTo(time);
		e.stopPropagation();
		return false;
	});
});

onPlayerStateChangeCallbacks.push(function(code) {
    if (!$("#player").length || !$("#subtitles").length)
        return false;

	if (code == 1) { // playing
		if ($high == null) {
			$high = $("#subtitles div:first");
			$high.addClass("highlight");
			updateOverlay();
		}

		sub_ticker = setInterval(function() {
			moveSubtitles(player.getCurrentTime());
		}, 500);

	} else if (code == -1) { // created
		/** prepare scroll helpers */
		$("#subtitles div").each(function(i, el) {
			$(el).data('scroll-to', $(el).position().top - $("#subtitles").position().top);
		});
		center = $("#subtitles").height() * 1/3; // position to scroll subtitles to

	} else {
		clearInterval(sub_ticker);
		if ($high) {
			$high.removeClass("highlight");
			$high = null;
		}
	}
});

function moveSubtitles(time) {
	if ($high) {
		$high.removeClass("highlight");
	}
	while ($high.length && $high.data('end') < time) {
		$high = $high.next();
	}
	$high.addClass("highlight");
	updateOverlay();
	$("#subtitles").scrollTop($high.data('scroll-to') - center);
}

function updateOverlay() {
	$("#subtitles-overlay").text($high.text());
}
