<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Quickpay;

class PaymentController extends Controller
{
    public function payment() {
        
        return view('payment');
    }

    public function pay() {

        $client = new Quickpay(env('QP_API_KEY'), env('QP_PRIVATE_KEY'));

        $payment = $client->payments()->create([
            'currency' => 'DKK',
            'order_id' => time(),
        ]);
        
        $link = $client->payments()->link($payment->getId(), [
            'amount' => 10000,
        ]);
        
        return redirect($link->getUrl());
    }
}
