<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function create(Request $request) {
        $order = new Order;
        $order->email = "";
        $order->phone = "";
        $order->cart = json_encode($request->cart);
        $order->save();
    }

    public function get(Request $request) {
        return Order::get();
    }

    
}
