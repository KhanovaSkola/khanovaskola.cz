var sub_ticker = null;
var center = null;
var $high = null;
var initialized = false;

onLoadQueuePersistent.push(function() {
	if (!$("#player").length || !$("#subtitles").length)
		return false;

	if ($(".entity").data('format') === 'dubbed') {
		$("#subtitles-overlay").hide();
		return false;
	}

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

onPlayerStateChangeCallbacks.push(function(code)
{
	if (!$("#player").length || !$("#subtitles").length)
        return false;

	if (code == 1) { // playing
		if (!initialized) {
			init();
			initialized = true;
		}

		if ($high == null) {
			$high = $("#subtitles div:first");
			$high.addClass("highlight");
			updateOverlay();
		}

		var delta = 500;
		sub_ticker = setInterval(function() {
			moveSubtitles(player.getCurrentTime());
		}, delta);

	} else if (code == -1) { // created
		// todo no longer called :(

	} else { // stopped
		$("#fb-overlay").show();
		clearInterval(sub_ticker);
		if ($high) {
			//$high.removeClass("highlight");
			$high = null;
		}
	}
});

function init() {
	/** prepare scroll helpers */
	$("#subtitles div").each(function(i, el) {
		$(el).data('scroll-to', $(el).position().top - $("#subtitles").position().top);
	});
	center = 30;//$("#subtitles").height() * 1/3; // position to scroll subtitles to
}

function moveSubtitles(time) {
	if ($high === null)
	{
		return;
	}

	$high.removeClass("highlight");
	while ($high.length && $high.data('end') < time) {
		$high = $high.next();
	}
	$high.addClass("highlight");
	updateOverlay();
	animateMove();
}

function animateMove()
{
	var target = $high.data('scroll-to') - center;
	var diff = $("#subtitles").scrollTop() - target;

	if (Math.abs(diff) < 2)
	{
		return;
	}
	else if (Math.abs(diff) > 100)
	{
		$("#subtitles").scrollTop(target);
		return;
	}

	$("#subtitles").scrollTop(
		$("#subtitles").scrollTop() +
		($("#subtitles").scrollTop() - target > 0
			? -2 : 2
		)
	);
	if (target > 0 && Math.abs($("#subtitles").scrollTop() - target) > 2)
	{
		setTimeout(animateMove, 10);
	}
}

function updateOverlay() {
	$("#subtitles-overlay").text($high.text());
}
