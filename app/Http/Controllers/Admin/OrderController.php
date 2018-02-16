<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function create(Request $request) {
        
        $order = new Order;
        $order->email = $request->email;
        $order->phone = $request->phone;
        
        $order->billing_fname = $request->first_name;
        $order->billing_address = $request->address;
        $order->billing_surname = $request->surname;
        $order->billing_zip_code = $request->zip;

        $order->delivery_fname = $request->first_name_delivery;
        $order->delivery_address = $request->surname_delivery;
        $order->delivery_surname = $request->address_delivery;
        $order->delivery_zip_code = $request->zip_delivery;
        
        $order->cart = json_encode($request->cart);
        $order->save();

        $order->code = md5($order->id);
        $order->save();
    }

    public function get(Request $request) {
        return Order::get();
    }

    
}
