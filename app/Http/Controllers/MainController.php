<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class MainController extends Controller
{
    public function index(Request $request) {
        $chunks = [
            "mebfc" => 3,
            "mebfc2" => 2,
            "70g" => 3,
            "12g" => 3,
            "200g" => 2,
            "2000g" => 3
        ];

        $product = Category::get()->keyBy('code')->each(function($c) use ($chunks) {
            if ( ! empty($chunks[$c->code])) {
                $c->product = $c->product->chunk($chunks[$c->code]);
            }
        });
        
        return view('main', [
            'category' => Category::get()->keyBy('code'),
            'product' => $product
        ]);
    }
}
