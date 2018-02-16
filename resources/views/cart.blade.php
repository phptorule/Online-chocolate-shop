@extends('layouts.app')

@section('content')
    <section class="cart">
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                <h2 class="h2_caption text-center">
                    <span>{{ __('cart.cart') }}</span>
                    <img src="/img/pic/cart.png" alt="cart">
                </h2>
                <form class="cart-show">
                    <div class="table-responsive">
                        <table class="table table_cart">
                            <thead>
                                <tr class="header_row">
                                    <th></th>
                                    <th>{{ __('cart.product') }}</th>
                                    <th>{{ __('cart.price') }}</th>
                                    <th>{{ __('cart.number') }}</th>
                                    <th>{{ __('cart.total') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cartList"></tbody>
                        </table>
                        </div>
                    </div>
                    <button type="button" class="mix_count_butt butt cart-show" data-url="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), 'check-out') }}" id="orderCheckOut">{{ __('cart.checkout') }}</button>
                </form>
                <div class="cart-empty" style="display: none;">
                    <p>{{ __("cart.cart_empty") }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="instagram_box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider_wrapper">
                    </div>   
                </div>
            </div>
        </div>
    </section>

<div id="modal_instagram" class="modal modal_instagram fade" role="dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="slider_wrapper_modal">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            getCart();

            $(document).on( 'click', '.plus', function() {
                var count = $(this).parent().find('input').val() * 1,
                    price = $(this).data('price');
                
                count = count + 1;                    

                $(this).parent().find('input').val(count);
                $(this).closest("tr").find(".count").text((count * price) + " DKK");
            });

            $(document).on('click', '.minus', function() {
                var count = $(this).parent().find('input').val() * 1,
                    price = $(this).data('price');
                
                count = count - 1;                    
                if (count) {
                    $(this).parent().find('input').val(count);
                    $(this).closest("tr").find(".count").text((count * price) + " DKK");
                }
            });

            $(document).on('click', '.remove-cart-item', function() {
                cart.removeProduct($(this).data('id'));
                window.location.reload();
            });

            $('#orderCheckOut').click(function() {
                window.location.href = $(this).data('url');
            });
        });


        function getCart() {
            $.ajax({
                url : "/getCart",
                method: "post",
                data : {
                    _token : $("meta[name='csrf-token']").attr('content'),
                    cart : cart.getCart()
                },
                success : function(data) {
                    if (data) {
                        printCart(data);
                        return ;
                    }

                    $(".cart-show").hide();
                    $(".cart-empty").show();
                }
            });
        }

        function printCart(data) {
            var content = "";
            for(var i in data) {
                content += "<tr>";
                content += "<td><img src='/storage/" + data[i].image.replace('public', '') + "' alt='img' /></td>";
                content += "<td>" + data[i].name + "</td>";            
                content += "<td>" + data[i].price + " DKK</td>";                                    
                content += "<td>";
                content += "<div class='candies_count_add'>";                            
                content += "<button type='button' data-price='" + data[i].price + "' class='plus'>+</button>";
                content += "<input type='text' value='" + getCountById(data[i].id) + "' readonly>";                                
                content += "<button type='button' data-price='" + data[i].price + "' class='minus'>-</button>";
                content += "</div>";
                content += "</td>";
                content += "<td class='count'>" + ( getCountById(data[i].id) ? data[i].price * getCountById(data[i].id) : data[i].price ) + " DKK</td>";
                content += "<td>";
                content += "<i class='fa fa-trash remove-cart-item' data-id='" + data[i].id + "'></i>";
                content += "</td>";
                content += "</tr>";
            }
            
            $("#cartList").html(content);
           
        }

        function getCountById(product_id) {
            var cart = JSON.parse(localStorage.getItem("_cart"));
            for(var i in cart) {
                var item = cart[i];
                if(item.product_id * 1 == product_id) {
                    return item.count;
                }
            }
            return 0;
        }
    </script>
@endpush