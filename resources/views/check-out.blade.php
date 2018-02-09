@extends('layouts.app')

@section('content')

<section class="check_out">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="h2_caption text-center">CHECK OUT</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="check_out_wrapper">
                <form>
                    <div class="form_row_wrapper">
                        <span class="form_row_caption text-center">CONTACT</span>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="telephone">TELEPHONE*</label>
                                <input type="text" id="telephone" name="telephone" class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="email">E-MAIL*</label>
                                <input type="text" id="email" name="email" class="input_form">
                            </div>
                        </div>
                    </div>
                    <div class="form_row_wrapper">
                        <span class="form_row_caption text-center">BILLING ADDRESS</span>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="first_name">FIRST NAME*</label>
                                <input type="text" id="first_name" name="first_name" class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="address">ADRESS*</label>
                                <input type="text" id="address" name="address" class="input_form">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="surname">SURNAME*</label>
                                <input type="text" id="surname" name="surname" class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="zip">ZIP CODE <span>(DELIVERY ONLY IN DENMARK)</span>*</label>
                                <input type="text" id="zip" name="zip" class="input_form">
                            </div>
                        </div>
                    </div>
                    <div class="form_row_wrapper">
                        <span class="form_row_caption text-center">DELIVERY ADDRESS</span>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="first_name_delivery">FIRST NAME*</label>
                                <input type="text" id="first_name_delivery" name="first_name_delivery" class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="address_delivery">ADRESS*</label>
                                <input type="text" id="address_delivery" name="address_delivery" class="input_form">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label for="surname_delivery">SURNAME*</label>
                                <input type="text" id="surname_delivery" name="surname_delivery" class="input_form">
                            </div>
                            <div class="col-sm-6">
                                <label for="zip_delivery">ZIP CODE <span>(DELIVERY ONLY IN DENMARK)</span>*</label>
                                <input type="text" id="zip_delivery" name="zip_delivery" class="input_form">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="input_butt mix_count_butt butt">next</button>
                </form>

            </div>
        </div>
    </div>
</div>
</section>

@endsection