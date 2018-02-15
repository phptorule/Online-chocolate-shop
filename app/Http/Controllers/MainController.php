<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Subscriber;
use LaravelLocalization;
use App\Mail\InviteSubscribeUser;
use Mail;

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

    public function subscribeUser(Request $request) {
        $email = $request->input("email");

        if ( ! empty($email)) {

            if ( ! Subscriber::where('email', $email)->count()) {
                $subscriber = new Subscriber;
                $subscriber->email = $email;
                $subscriber->status = "subscribe";
                $subscriber->save();
                
                Mail::to(env('ADMIN_EMAIL', 'admin@admin.com'))->send(new InviteSubscribeUser());

                return redirect('/')->with(['status' => 'success', 'message' => __('messages.success_subscribe')]);
            }
            return redirect('/')->with(['status' => 'warning', 'message' => __('messages.subscriber_already_exist')]);
        }
        
        return redirect('/')->with(['status' => 'danger', 'message' => __('messages.error_success')]);
    }
}
