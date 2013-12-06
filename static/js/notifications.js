$(function(){

	// Multiselect serach field
    $('.multiselect').multiselect();

	//Toggle response form
	$('.notification .respond').click(function(e){
		$(this).parents('.notification').find('.response').slideToggle();
		e.preventDefault();
	});

	$('.notification .response').hide();

	// Theme filter
	$('.theme-filter').change(function(){
		$('.notification').hide();

		var themes = $(this).val();
		if (themes && themes.length > 0) {
			for (var t in themes) {
				$('.' + themes[t]).parents('.notification').show();
			}
		} else {
			$('.notification').show();
		}
	});
});
