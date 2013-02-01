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

onPlayerStateChangeCallbacks.push(fireGAEvent);
function fireGAEvent(code) {
	if (code == 0) {
		_gaq.push(['_trackEvent', 'Video', 'Video-Watched', ]);
	}
}
