var url = window.location.protocol + "//" + window.location.hostname + "/cviceni/list?do=saveAnswer";
var path = window.location.pathname;

var sent = false;
var time_started = null;
$(Khan).bind("newProblem", function(event, result) {
	sent = false;
	hint = false;

	var $related = $("#injected-related");
	$('.info-box.hint-box').append($related);
	time_started = new Date().getTime();
});

var hint = false;
$(Khan).bind("hintUsed", function(event, result) {
	hint = true;
});

$(Khan).bind("checkAnswer", function(event, result) {
	if (!khanovaskola_user_logged_in || sent || hint)
		return false;

	$.ajax(url, {
		data: {
			exercise_id: khanovaskola_exercise_id,
			correct: result.pass,
			time: new Date().getTime() - time_started
		},
		success: function(response) {
			sent = true;
		},
		error: function(response) {
			console.error(response);
		}
	});
});
