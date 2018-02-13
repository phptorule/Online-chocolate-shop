<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use LaravelLocalization;

class MainController extends Controller
{
    public function index(Request $request) {

        $product = Category::with('product')->get()->keyBy('code');
        
        return view('main', [
            'category' => Category::get()->keyBy('code'),
            'product' => $product
        ]);
    }

    public function search(Request $request) {
        return view("search");
    }

    public function searchAjax(Request $request) {
        $query = $request->input("query");

        $products = Product::get()->filter(function($item) use ($query) {
            return $item->translate->every(function($item) use ($query) {
                return stripos($item->translate->name, $query) !== false;
            });
        });
        
        return $products;
    }
}
