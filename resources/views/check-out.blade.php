@extends('layouts.app')

@section('content')

<section class="check_out">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="h2_caption text-center text-uppercase">{{ __('checkout.checkout') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="check_out_wrapper">
                <form id="orderForm">
                    <div class="form_row_wrapper">
                        <span class="form_row_caption text-center">{{ __('checkout.contact') }}</span>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="telephone" class=" text-uppercase">{{ __('checkout.phone') }}*</label>
                                <input type="text" id="telephone" name="telephone" required class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class=" text-uppercase">{{ __('checkout.email') }}*</label>
                                <input type="text" id="email" name="email" required class="input_form">
                            </div>
                        </div>
                    </div>
                    <div class="form_row_wrapper">
                        <span class="form_row_caption text-center" class=" text-uppercase">{{ __('checkout.address') }}</span>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="first_name" class=" text-uppercase">{{ __('checkout.first_name') }}*</label>
                                <input type="text" id="first_name" required name="first_name" class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class=" text-uppercase">{{ __('checkout.address') }}*</label>
                                <input type="text" id="address" name="address" required class="input_form">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="surname" class=" text-uppercase">{{ __('checkout.surname') }}*</label>
                                <input type="text" id="surname" name="surname" required class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="zip" class=" text-uppercase">{{ __('checkout.zip_code') }} <span>({{ __('checkout.zip_code_sub') }})</span>*</label>
                                <input type="text" id="zip" name="zip" required class="input_form">
                            </div>
                        </div>
                    </div>
                    <div class="form_row_wrapper">
                        <span class="form_row_caption text-center text-uppercase">DELIVERY ADDRESS</span>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="first_name_delivery" class="text-uppercase">{{ __('checkout.first_name') }}*</label>
                                <input type="text" id="first_name_delivery" required name="first_name_delivery" class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="address_delivery" class="text-uppercase">{{ __('checkout.address') }}*</label>
                                <input type="text" id="address_delivery" required name="address_delivery" class="input_form">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="surname_delivery" class="text-uppercase">{{ __('checkout.surname') }}*</label>
                                <input type="text" id="surname_delivery" required name="surname_delivery" class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="zip_delivery" class="text-uppercase">{{ __('checkout.zip_code') }} <span>({{ __('checkout.zip_code_sub') }})</span>*</label>
                                <input type="text" id="zip_delivery" required name="zip_delivery" class="input_form">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="input_butt mix_count_butt butt">{{ __('checkout.next') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
</section>

@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script>
        var paymentUrl = "{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), 'payment') }}";
        $(document).ready(function() {
            
            $.validator.setDefaults( {
                submitHandler: function () {
                    var order = {
                        'phone' : $('#telephone').val(),
                        'email' : $('#email').val(),
                        'first_name' : $('#first_name').val(),
                        'address' : $('#address').val(),
                        'surname' : $('#surname').val(),
                        'zip' : $('#zip').val(),
                        'first_name_delivery' : $('#first_name_delivery').val(),
                        'surname_delivery' : $('#surname_delivery').val(),
                        'address_delivery' : $('#address_delivery').val(),
                        'zip_delivery' : $('#zip_delivery').val(),
                    };

                    $.ajax({
                        url : "/createOrder",
                        method : "post",
                        data : Object.assign({
                            _token : $("meta[name='csrf-token']").attr('content'),
                            cart : cart.getCart()
                        }, order),
                        success : function(data) {
                            cart.selfDestruction();
                            window.location.href = paymentUrl + "?code=" + data.code;
                        }
                    });
                }
            } );

			$("#orderForm").validate( {
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					error.addClass( "help-block" );
                    error.css({display: "block", transform: "translateY(-43px)"});
					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-6" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-sm-6" ).addClass( "has-success" ).removeClass( "has-error" );
				}
            });

         
            
        });
    </script>
@endpush