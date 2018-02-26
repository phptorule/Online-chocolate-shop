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
                cart.removeProduct($(this).data('id'), $(this).data('type'));
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
                success : function(res) {
                    if (res) {
                        var data = {};
                        res.map(function(i) {
                            data[i.id] = i;
                        });
                        printCart(data);
                        return ;
                    }

                    $(".cart-show").hide();
                    $(".cart-empty").show();
                }
            });
        }

        function groupByBox(cart, products) {
            var boxs = {},
                cendy = [];
            
            for(var i in cart) {
                if (cart[i].box) {
                    if ( ! boxs[cart[i].box]) {
                        boxs[cart[i].box] = [];
                    }
                    
                    var args = Object.assign({}, products[cart[i].product_id]);
                        args.count = cart[i].count;

                    boxs[cart[i].box].push(args);
                } else {
                    cendy.push(cart[i]);
                }
            }

            grouped = [];

            for(var i in boxs) {
                grouped.push({ type : 'box', value :  boxs[i], id : i});
            }

            cendy.map(function(value) {
                grouped.push({ type : 'candy', value :  products[value.product_id]});
            });
            
            return grouped;
        }

        function printCart(products) {
            var items = groupByBox(cart.getCart(), products),
            content = "";

            for(var i in items) {
                content += "<tr>";
                content += window["print" + items[i].type.charAt(0).toUpperCase() + items[i].type.slice(1, items[i].type.length).toLowerCase() + "Item"](items[i].value, items[i].id);
                content += "";
                content += "</tr>";
            }
            
            $("#cartList").html(content);  
        }

        function printCandyItem(item, product_id) {
            var content = "";
            content += "<td><img src='/storage/" + item.image.replace('public', '') + "' alt='img' /></td>";
            content += "<td>" + item.name + "</td>";            
            content += "<td>" + item.price + " DKK</td>";                                    
            content += "<td>";
            content += "<div class='candies_count_add'>";                            
            content += "<button type='button' data-price='" + item.price + "' class='plus'>+</button>";
            content += "<input type='text' value='" + getCountById(item.id) + "' readonly>";                                
            content += "<button type='button' data-price='" + item.price + "' class='minus'>-</button>";
            content += "</div>";
            content += "</td>";
            content += "<td class='count'>" + ( getCountById(item.id) ? item.price * getCountById(item.id) : item.price ) + " DKK</td>";
            content += "<td>";
            content += "<i class='fa fa-trash remove-cart-item' data-id='" + item.id + "'></i>";
            content += "</td>";
            return content;
        }

        function printBoxItem(box, box_id) {
            var attach = {
                '12' : {
                    name : 'Boks med 12 fyldte chokolader',
                    img : '/img/pic/2.png'
                },
                '6' : {
                    name : 'Boks med 6 flødeboller',
                    img : '/img/pic/6box.png'
                }
            };
            
            var name = "",
                total = 0,
                count = 0,
                image = "http://placehold.it/250";

            box.map(function(item) {
                count += item.count;
                total += item.price * item.count;
            });

            name =  attach[count] ? attach[count].name : name;
            image = attach[count] ? attach[count].img : image;
           
            var content = "";
            content += "<td><img src='" + image + "' alt='box' /></td>";
            content += "<td>" + name + "</td>";            
            content += "<td>" + total + "</td>";                              
            content += "<td>";
            content += "<div class='candies_count_add'>";                            
            content += "<button type='button' data-price='" + total + "' class='plus'>+</button>";
            content += "<input type='text' value='1' readonly>";                                
            content += "<button type='button' data-price='" + total + "' class='minus'>-</button>";
            content += "</div>";
            content += "</td>";
            content += "<td class='count'>" + total + " DKK</td>";
            content += "<td>";
            content += "<i class='fa fa-trash remove-cart-item' data-type='box' data-id='" + box_id + "'></i>";
            content += "</td>";
        
            return content;
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