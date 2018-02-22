<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Quickpay;
use App\Order;
use App\Product;

class PaymentController extends Controller
{
    public function payment() {
        
        return view('payment');
    }

    public function pay(Request $request) {
        $amount = 0;
        $products = Product::get()->keyBy('id');

        Order::where('code', $request->code)->get()->each(function($order) use (&$amount, $products) {
            collect($order->cart)->each(function($p) use (&$amount, $products) {
                $amount += $p->count * $products[$p->product_id]->price;
            }); 
        });

        $client = new Quickpay(env('QP_API_KEY'), env('QP_PRIVATE_KEY'));

        $payment = $client->payments()->create([
            'currency' => 'DKK',
            'order_id' => time(),
        ]);
        
        $link = $client->payments()->link($payment->getId(), [
            'amount' => $amount * 100,
        ]);
        
        return redirect($link->getUrl());
    }
}
