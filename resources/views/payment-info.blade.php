@extends('layouts.app')

@section('content')

<section class="payment_info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2_caption">YOUR PAYMENT INFORMATION</h2>
                <div class="payment_info_box">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="payment_info_box_item">
                                <span class="payment_info_box_item_caption">CONTACT</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment_info_box_item">
                                <span class="payment_info_box_item_caption">BILLING ADRESS</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="payment_info_box_item">
                                <span class="payment_info_box_item_caption">DELIVERY ADRESS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="h2_caption">YOUR DELIVERY</h2>
                <form>
                    <div class="table-responsive">
                        <table class="table table_cart">
                            <thead>
                                <tr class="header_row">
                                    <th></th>
                                    <th>ITEM</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form_check">
                        <div class="form_check_row">
                            <label for="yes" class="check_row_label">
                                <input type="checkbox" id="yes">
                                <span class="check_row_label_im"></span>
                                <span>YES PLEASE! I would like to be subscribed to your</span>
                            </label>
                        </div>
                        <div class="form_check_row">
                            <label for="yes1" class="check_row_label">
                                <input type="checkbox" id="yes1">
                                <span class="check_row_label_im"></span>
                                <span>I accept the <a href="#">Terms and Conditions</a></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="mix_count_butt butt">PAYMENT</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection