<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function get(Request $request) {
        $category = Category::query();
        if ( ! empty($request->id)) {
            return $category->where("id", $request->id)->first();
        }
        return $category->get();
    }

    public function edit(Request $request) {
        $category = Category::find($request->id);
        $category->name = "";
        $category->position = $request->position;
        $category->code = $request->code;
        $category->color = $request->color ? $request->color : "#ffffff";
        if ( ! empty($request->tmp_image)) {
            $category->image = $request->tmp_image->store("public/image");
        }
        
        $category->save();

        $langs = \App\Lang::get()->keyBy("code");
        foreach(json_decode($request->translate) as $code => $translate) {
            $category->translate()->where('langs_id', $langs[$code]->id)->update(['transalte' => json_encode($translate)]);
        }
    }

    public function delete($id) {
        Category::find($id)->delete();
    }
}
