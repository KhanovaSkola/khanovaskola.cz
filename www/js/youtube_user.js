var player = null;
var ticker = null;

var tag = document.createElement('script');
tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubeIframeAPIReady() {
	var height = 480;
	var width = 800;

	player = new YT.Player('player', {
		height: height,
		width: width,
		playerVars: {
			autoplay: youtube_autoplay,
			showinfo: 0
		},
		videoId: youtube_video_id,
		events: {
			//'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
		}
	});
}

var done = false;
var onPlayerStateChangeCallbacks = [];
function onPlayerStateChange(event) {
	for (i = 0; i < onPlayerStateChangeCallbacks.length; ++i) {
		onPlayerStateChangeCallbacks[i](event.data);
	}
}

onPlayerStateChangeCallbacks.push(saveState);
function saveState(code) {
	if (code == 1) {
		ticker = setInterval(function() {
			updateProgress(player.getCurrentTime());
		}, 5000);
	} else {
		clearInterval(ticker);
	}

	if (code == 0) { // save only if video ended
		updateProgress(-1);
	}
}

function updateProgress(progress) {
	$.ajax(youtube_progress_url, {
		data: { seconds: progress},
		success: function(response) {
			if (response.status !== 'success') {
				console.error("Error while saving progress: ", response);
			}
		}
	});
}

onPlayerStateChangeCallbacks.push(fireGAEvent);
function fireGAEvent(code) {
	if (code == 0) {
		_gaq.push(['_trackEvent', 'Video', 'Video-Watched', video_id]);
	}
}
