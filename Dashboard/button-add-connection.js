$(document).ready(function() {

	$(".button").click(function() {
		//Use JQuery dialog boxes to create a popup form
		$("#dialog").removeClass('hidden');
		$("#dialog").dialog({
			modal: true,
			resizable: false,
			dialogClass: 'add-connection-dialog'
		});
	});
});