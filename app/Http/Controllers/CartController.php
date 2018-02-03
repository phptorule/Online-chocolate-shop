<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function get(Request $request) {
        $product_ids = collect($request->cart)->pluck('product_id');
        if (count($product_ids)) {
            return Product::with("category")->whereIn("id", $product_ids)->get();
        }
    }
}
