<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lang;

class LangsController extends Controller
{
    public function get(Request $request) {
        return Lang::get();
    }

    public function update(Request $request) {
        
        Lang::query()->update(['default' => 0]);

        $lang = Lang::find($request->langs_id);
        $lang->default = 1;
        $lang->save();
    }
}
