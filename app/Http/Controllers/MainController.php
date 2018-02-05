<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class MainController extends Controller
{
    public function index(Request $request) {

        $product = Category::get()->keyBy('code');
        
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
        return Product::where('name', 'like', '%' . $query . '%')->orWhere('description', 'like', '%' . $query . '%')->limit(10)->get();
    }
}
