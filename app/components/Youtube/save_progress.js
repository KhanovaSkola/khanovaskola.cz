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
	$.ajax("{plink updateProgress!, autoplay => NULL}", {
		data: { seconds: progress},
		success: function(response) {
			if (response.status !== 'success') {
				console.error("Error while saving progress: ", response);
			}
		}
	});
}
