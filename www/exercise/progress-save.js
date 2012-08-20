var url = window.location.protocol + "//" + window.location.hostname + "/cviceni/list?do=saveAnswer";
var path = window.location.pathname;
var exercise = path.substring(path.lastIndexOf('/') + 1);
exercise = exercise.substring(0, exercise.length - 5); // trim .html


var sent = false;
$(Khan).bind("newProblem", function(event, result) {
	sent = false;
	hint = false;
});

var hint = false;
$(Khan).bind("hintUsed", function(event, result) {
	hint = true;
});

$(Khan).bind("checkAnswer", function(event, result) {
	console.log(result.pass, exercise);
	if (sent || hint)
		return false;

	$.ajax(url, {
		data: {name: exercise, correct: result.pass},
		success: function(response) {
			sent = true;
		},
		error: function(response) {
			console.error(response);
		}
	});
});
