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
}
