@extends('layouts.app')

@section('content')
    <section class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h2 class="h2_caption text-center">
                    <span>INKØBSKURV</span>
                    <img src="img/pic/cart.png" alt="cart">
                </h2>
                <form>
                    <div class="table-responsive">
                        <table class="table table_cart">
                            <tr class="header_row">
                                <th></th>
                                <th>VARER</th>
                                <th>PRIS</th>
                                <th>ANTAL</th>
                                <th>I ALT</th>
                            </tr>
                            <tr>
                                <td><img src="/storage/image/pic_1.png" alt="img"></td>
                                <td>EDEL WEISS 40% 70 g. bar</td>
                                <td>59 DKK</td>
                                <td>
                                    <div class="candies_count_add">
                                        <button type="button" id="plus">+</button>
                                        <input type="text" value="1" readonly>
                                        <button type="button" id="minus">-</button>
                                    </div>
                                </td>
                                <td>59 DKK</td>
                            </tr>
                            <tr>
                                <td><img src="/storage/image/pic_1.png" alt="img"></td>
                                <td>EDEL WEISS 40% 70 g. bar</td>
                                <td>59 DKK</td>
                                <td>
                                    <div class="candies_count_add">
                                        <button type="button" id="plus">+</button>
                                        <input type="text" value="1" readonly>
                                        <button type="button" id="minus">-</button>
                                    </div>
                                </td>
                                <td>59 DKK</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <button type="submit" class="mix_count_butt butt">CHECK UD</button>
                </form>
            </div>
        </div>
    </section>
@endsection