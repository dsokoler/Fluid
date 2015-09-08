$(document).ready(function() {

	$('.searchform').keyup(function() {
		var textInput = $(this).val().toLowerCase();

		//If selected div will dissapear move it to the bottom with
		// a selected label??????????????

		//Could add radio buttons to create options: search name, IP, or both

		var numChildren = $('.item-container').children().length;

		//0 = even, 1 = odd
		var even_or_odd = 0;
		if (textInput !== '') {
			for (i = 1; i < 7; i++) {
				var id 		= "item-" + i;
				var div 	= $('#' + id);
				var divText = div.children().html().toLowerCase();

				if (divText.search(textInput) == -1) {
					div.hide();
				}
				else {
					div.show();

					div.removeClass('even');
					div.removeClass('odd');

					if (even_or_odd == 0) {
						div.addClass('even');
						even_or_odd = 1;
					}
					else if (even_or_odd == 1) {
						div.addClass('odd');
						even_or_odd = 0;
					}
				}
			}
		}
		else {
			even_or_odd = 0;
			for (i = 1; i < 7; i++) {
				var id 		= "item-" + i;
				var div 	= $('#' + id);

				div.removeClass('even');
				div.removeClass('odd');

				if (even_or_odd == 0) {
					div.addClass('even');
					even_or_odd = 1;
				}
				else if (even_or_odd == 1) {
					div.addClass('odd');
					even_or_odd = 0;
				}
			}
			$(".item-container").children().show();
		}
	});
});