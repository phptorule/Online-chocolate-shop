<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;

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

        return ['code' => $order->code];
    }

    public function get(Request $request) {
        $orders = Order::get();
        $products = Product::get()->keyBy('id');

        $orders = $orders->each(function($value) use ($products) {
            $value->count = collect($value->cart)->sum('count');
            
            $total = 0;
            $value->cart = collect($value->cart)->each(function($cart) use ($products, &$total)  {
                $cart->product = ! empty($products[$cart->product_id]) ? $products[$cart->product_id] : false;
                $total += $cart->product->price * $cart->count;
            });
            
            $value->total = $total;
        });

        $orders->each(function($order) {
            if (collect($order->cart)->every(function($value, $key) {
                return ! empty($value->box) ? true : false;
            })) {
                $order->cart = collect($order->cart)->groupBy('box');    
            }
        });

        return $orders;
    }

    
}
