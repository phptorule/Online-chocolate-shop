var cart = (function() {
    var cartKey = "_cart";

    function readStorage() {
        var data = window.localStorage.getItem(cartKey);
        return JSON.parse(data ? data : "[]");
    }

    return {
        selfDestruction : function() {
            window.localStorage.setItem(cartKey, "[]");
        },
        removeProduct : function(product_id) {
            var self = this,
                cart = self.getCart();

            cart = cart.filter(function(item){
                if (item.product_id != product_id) {
                    return true;
                }
                return false;
            });

            self.selfDestruction();
            
            cart.map(function(item){
                self.addToCart(item.product_id, item.count);
            });
        },
        addToCart : function(product_id, count) {
            count = count || 1;
            
            var cart = readStorage(),
                check = false;
            cart = cart.map(function(item) {
                if (item.product_id == product_id) {
                    item.count = count;
                    check = true;
                }
                return item;
            });

            if ( ! check) {
                cart.push({product_id : product_id, count : count});
            }
            
            window.localStorage.setItem(cartKey, JSON.stringify(cart));
        },
        getCart : function() {
            return readStorage();
        }
    };
})();

$(document).ready(function() {
    
    //Scrooll
	$('.item_scrolll').mPageScroll2id({
		scrollSpeed : 500
    });

    //Add
    window.candies = [];
    window.candle = [];

    $('.candi_item').click(function(e) {
        var value = $(this).data('title'),
            box = $(this).data("box");
            product_id = $(this).data('id');

        if (window[box] != undefined) {
            window[box].push(product_id);
        }
        
        var selector = $(this).parents('.col-md-6').siblings('.col-md-6').children('.mix_count').children('.mix_count_list').find('p');
        $(selector).each(function(index, element) {
            if ( ! $(this).children('span').html()) {
                $(this).find('span').html(value).append('<i class="fa fa-trash trash_candi" data-box="' + box + '" data-id="' + product_id + '" aria-hidden="true"></i>');
                return false;
            }
        });
    });

    $(document).on( 'click', '.trash_candi', function() {
        $(this).parent('span').empty();
        
        var product_id = $(this).data('id'),
            box = $(this).data('box');

        if (window[box]) {
            delete window[box][window[box].indexOf(product_id)];
            window[box] = window[box].filter(function(a){ return a ? true : false; })
        }
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

    $(".add_to_card").click(function() {
        var box = window[$(this).data("box")] || [];
        
        var counts = {};
        for(var p in box) {
            if ( ! counts[box[p]]) {
                counts[box[p]] = 1;
                continue;
            }
            counts[box[p]] += 1;
        }

        for(var p in counts) {
            cart.addToCart(p, counts[p]);
            window.location.href = "/cart";
        }
    });
});