<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function add(Request $request) {
        
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = ! empty($request->name) ? $request->name : "";
        $product->price = ! empty($request->price) ? $request->price : 0;
        $product->description = ! empty($request->description) ? $request->description : "";
        $product->short_description = ! empty($request->short_description) ? $request->short_description : "";
        $product->position = ! empty($request->position) ? $request->position : 0;
        $product->status =  "active";
        $product->color = $request->color;
        $product->active_effect = ! empty($request->active_effect) ? $request->active_effect : "";

        $product->hover_check = $request->hover_check ? true : false;

        if ( ! $request->hover_check) {
            $product->hover_text = $request->hover_text ?  $request->hover_text : "";
            $product->hover_color = $request->hover_color ? $request->hover_color : "#ffffff";
            $product->hover_img = "";
        } else {
            $product->hover_img = ! empty($request->hover_img) ? $request->hover_img->store("public/image") : "";
            $product->hover_text = "";
            $product->hover_color = "";
        }

        $product->image = ! empty( $request->image ) ? $request->image->store("public/image") : "";
        $product->save();
        
        if ($request->translate) {
            $request->translate = json_decode($request->translate);
            foreach($request->translate as $code => $translate) {
                $this->addTranslate("products", $product->id, $translate, $code);
            }
       }
    }

    public function edit(Request $request) {
        
        $product = Product::find($request->id);
        $product->category_id = $request->category_id;
        $product->name = ! empty($request->name) ? $request->name : ""; ;
        $product->price = $request->price;
        $product->description = ! empty($request->description) ? $request->description : "";
        $product->short_description = ! empty($request->short_description) ? $request->short_description : "";
        $product->position = ! empty($request->position) ? $request->position : 0;
        $product->status = ! empty($request->status) ? $request->status : "active";
        $product->color = $request->color;

        $product->hover_check = $request->hover_check ? true : false;

        if ( ! $request->hover_check) {
            $product->hover_text = $request->hover_text ?  $request->hover_text : "";
            $product->hover_color = $request->hover_color ? $request->hover_color : "#ffffff";
        } else {
            $product->hover_img = $request->hover_img instanceof UploadedFile ? $request->hover_img->store("public/image") : "";
        }
        
        if ($request->active_effect) {
            $product->active_effect = $request->active_effect ? $request->active_effect : '';
        }

        if ($request->tmp_image instanceof UploadedFile) {
            $product->image = $request->tmp_image->store("public/image");
        }

        $product->save();

        $langs = \App\Lang::get()->keyBy("code");
        foreach(json_decode($request->translate) as $code => $translate) {
            $product->translate()->where('langs_id', $langs[$code]->id)->update(['transalte' => json_encode($translate)]);
        }
    }

    public function get(Request $request) {
        $product = Product::query();
        if ( ! empty($request->id)) {
            return $product->with('category')->where("id", $request->id)->first();
        }
    
        return $product->with(['category'])->get();
    }

    public function delete($id) {
        Product::find($id)->delete();
    }
}
