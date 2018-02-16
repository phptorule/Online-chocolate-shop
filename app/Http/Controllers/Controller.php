<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Translate;
use App\Lang;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function addTranslate($table, $id, $tsl, $code) {
        $lang = Lang::first();
        if ($code) {
            $lang = Lang::where("code", $code)->first();
        }
        
        $translate = new Translate;
        $translate->table = $table;
        $translate->table_id = $id;
        $translate->langs_id = $lang->id;
        $translate->transalte = json_encode( ! empty($tsl) ? $tsl : "[]");
        $translate->save();
    }

    public function getTranslate($table, $id = false, $code = false) {
       if ($id) {
            return Translate::where('table', $table)->where('id', $id)->get();
       }
       return Translate::where('table', $table)->get();
    }

    // public function updateTranslate($table, $id, $code, $translate) {
    //     $langs = Lang::get()->keyBy("code");
    //     $translate = Translate::where("table", $table)->where("id", $id)->where("langs_id", $lagns[$code])->first();
    //     $translate->transalte = json_encode($translate);
    //     $translate->update();
    // }
}