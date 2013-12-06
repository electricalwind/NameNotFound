$(function(){

	// Multiselect serach field
    $('.multiselect').multiselect();

	//Toggle response form
	$('.notification .respond').click(function(){
		$(this).parents('.notification').find('.response').slideToggle();
	});

	$('.notification .response').hide();
});
