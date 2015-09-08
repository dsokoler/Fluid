$(document).ready(function() {

	var lastClicked;

	$('.item').click(function() {
		if (typeof lastClicked !== "undefined") {
			//remove selected class from last div clicked
			lastClicked.removeClass("selected");
		}

		//add selected class to current div, set current div to lastClicked
		$(this).addClass("selected");

		//Ensure we can get back to this div later
		lastClicked = $(this);


		//Need to get data from the server regarding this connection
		//-info needs to be within this user's scope.
		//-used in conjunction with get-modules.php
		var connName = $(this).children(":first").html();
		var ipAddr = $(this).children(":second").html();
	});
});