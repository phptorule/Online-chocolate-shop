$(document).ready(function() {
    
    //Scrooll
	$('.item_scrolll').mPageScroll2id({
		scrollSpeed : 500
    });

    //Add
    var candies = [];
    
    $('.candi_item').click(function(e) {
        var value = $(this).data('title');
        var selector = $(this).parents('.col-md-6').siblings('.col-md-6').children('.mix_count').children('.mix_count_list').find('p');
        $(selector).each(function(index, element) {
            if ( ! $(this).children('span').html()) {
                $(this).find('span').html(value).append('<i class="fa fa-trash trash_candi" aria-hidden="true"></i>');
                return false;
            }
        });
    });

    $(document).on( 'click', '.trash_candi', function() {
        $(this).parent('span').empty();
    });

    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

});
