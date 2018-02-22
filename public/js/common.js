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
        removeProduct : function(product_id, box) {
            var self = this,
                cart = self.getCart();
            
            if ( ! box) {
                cart = cart.filter(function(item){
                    if (item.product_id != product_id && item.type != 'box') {
                        return true;
                    }
                    return false;
                });
    
                self.selfDestruction();
                
                cart.map(function(item){
                    self.addToCart(item.product_id, item.count, item.box);
                });    
                return;
            }

            self.selfDestruction();

            cart = cart.filter(function(item) {
                if (item.box != product_id) {
                    return true;
                }
                return false;
            });

            cart.map(function(item) {
                self.addToCart(item.product_id, item.count, item.box);
            });
        },
        addToCart : function(product_id, count, box) {
            box = box || false;
            count = count || 1;
            
            var cart = readStorage();
            
            if ( ! box) {
                var check = false;

                cart = cart.map(function(item) {
                    if (item.product_id == product_id) {
                        item.count += count;
                        check = true;
                    }
                    return item;
                });
    
                if ( ! check) {
                    cart.push({product_id : product_id, count : count});
                }
            } else {
                cart.push({product_id : product_id, count : count, box : box});
            }
            
            window.localStorage.setItem(cartKey, JSON.stringify(cart));
        },
        getCart : function() {
            return readStorage();
        }
    };
})();

window.limitation = {
    candies : 12,
    candle : 6
};

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

        if (window[box] != undefined &&  window.limitation[box] != window[box].length) {
            window[box].push(product_id);
        }
        
        if (window.limitation[box] == window[box].length) {
            $("button[data-box='" + box + "']").removeAttr('disabled');
            $("button[data-box='" + box + "']").removeClass('disabled');
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

        if (window.limitation[box] != window[box].length) {
            $("button[data-box='" + box + "']").attr('disabled', 'disabled');
            $("button[data-box='" + box + "']").addClass('disabled');
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
                counts[box[p]] = 0;
            }
            counts[box[p]] += 1;
        }

        if (counts) {
            var boxId = 'box-' + (new Date() * 1);
            console.log(counts);
            for(var p in counts) {
                cart.addToCart(p, counts[p], boxId);
                window.location.href = "/cart";
            }
        }
    });

    $('#nav_open').on('click', function() {
        $('.hidden_menu').css('left', '0');
        $('#hidden_menu_overlay').css('display', 'block');
    });

    $('#nav_close').on('click', function() {
        $('.hidden_menu').css('left', '-411px');
        $('#hidden_menu_overlay').css('display', 'none');
    });

    $('.slider_wrapper').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplaySpeed: 9000,
        autoplay: false,
        arrows: true,
        prevArrow: '<div class="prev"><svg width="28px" height="50px" viewBox="0 0 50 80" xml:space="preserve"><polyline fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points=" 45.63,75.8 0.375,38.087 45.63,0.375 "/></svg> </div>',
        nextArrow: '<div class="next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="50px" viewBox="0 0 50 80" xml:space="preserve"><polyline fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="0.375,0.375 45.63,38.087 0.375,75.8 "/></svg></div>',
        infinite: false,
        pauseOnFocus: false,
        pauseOnHover: false,
        responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });

    $('.slider_wrapper_modal').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 9000,
        autoplay: false,
        arrows: true,
        prevArrow: '<div class="prev"><svg width="28px" height="50px" viewBox="0 0 50 80" xml:space="preserve"><polyline fill="none" stroke="#171717" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points=" 45.63,75.8 0.375,38.087 45.63,0.375 "/></svg> </div>',
        nextArrow: '<div class="next"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28px" height="50px" viewBox="0 0 50 80" xml:space="preserve"><polyline fill="none" stroke="#171717" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="0.375,0.375 45.63,38.087 0.375,75.8 "/></svg></div>',
        infinite: false,
        pauseOnFocus: false,
        pauseOnHover: false,
    });

    $(document).on('click', '.modal_instagram_butt', function(){
        $('.slider_wrapper_modal').slick('slickGoTo', $(this).parent().data('slick-index'));
        $("#modal_instagram").modal({
            backdrop: false
        }); 
    });

    //2348904022.724ad1a.db58f613dfab44ca894f5f481583fede 

    $.get("https://api.instagram.com/v1/users/self/media/recent/?access_token=2348904022.724ad1a.db58f613dfab44ca894f5f481583fede").done(function(data) {
        var response = data.data;
        response.forEach(function(item, i, arr) {
            var url = item.images.standard_resolution.url;
            var count_comment = item.comments.count;
            var count_likes = item.likes.count;
            var autor = item.user.username;
            var autorPhoto = item.user.profile_picture;
            var autorFullName = item.user.full_name;
            var caption = item.caption.text;
            var link = item.link;

            $('.slider_wrapper').slick('slickAdd', '<div class="slider_item"><a href="#" class="img_box modal_instagram_butt"><img src="' + url +'" alt="picture" class="instagram_photo"> <div class="overlay_inst"><div class="overlay_text"><span><i class="fa fa-heart-o" aria-hidden="true"></i> <span class="inst_likes">' + count_comment + '</span> </span><span><i class="fa fa-comment-o" aria-hidden="true"></i><span class="inst_comments">' + count_likes + '</span></span></div></div></a></div>');
            $('#modal_instagram').on('shown.bs.modal', function (e) {
                $('.slider_wrapper_modal').slick('slickAdd', '<div class="slider_wrapper_modal_item clearfix"><div class="inst_autor_info"><img src="' + autorPhoto + '" alt="img" class="inst_description_autor"><div><p class="inst_description_autor_name">' + autor + '</p><p class="inst_description_autor_name">' + autorFullName + '</p></div></div><a href="' + link + '" class="inst_img"><img src="' + url + '" alt="img"></a>  <div class="inst_description"><div><span><i class="fa fa-heart-o" aria-hidden="true"></i> <span class="inst_likes">' + count_comment + '</span> </span><span><i class="fa fa-comment-o" aria-hidden="true"></i><span class="inst_comments">' + count_likes + '</span></span></div><p class="inst_caption">' + caption + '</p></div></div>');
            })
        });
    });
    
});