/**
 * Created by Laura on 06/12/2013.
 */
$(function(){

    // Multiselect serach field
    $('.multiselect').multiselect();


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