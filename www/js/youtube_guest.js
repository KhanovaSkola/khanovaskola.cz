var player = null;
var ticker = null;

var tag = document.createElement('script');
tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var done = false;
var onPlayerStateChangeCallbacks = [];
function onPlayerStateChange(event) {
	for (i = 0; i < onPlayerStateChangeCallbacks.length; ++i) {
		onPlayerStateChangeCallbacks[i](event.data);
	}
}
