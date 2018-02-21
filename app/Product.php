<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelLocalization;

class Product extends Model
{
    public function category() {
        return $this->hasOne("App\Category", "id", "category_id");
    }

    public function translate() {
        return $this->hasMany("App\Translate", "table_id")->where("table", "products");
    }

    public function getNameAttribute($value) {
        $translate = $this->translate->filter(function($t){
            if ($t->lang->code == LaravelLocalization::getCurrentLocale()) {
                return true;
            }
        })->first();

        return ! empty($translate->translate->name) ? $translate->translate->name : "";
    }

    public function getDescriptionAttribute($value) {
        $translate = $this->translate->filter(function($t){
            if ($t->lang->code == LaravelLocalization::getCurrentLocale()) {
                return true;
            }
        })->first();

        return ! empty($translate->translate->description) ? $translate->translate->description : "";
    }

    public function getShortDescriptionAttribute($value) {
        $translate = $this->translate->filter(function($t){
            if ($t->lang->code == LaravelLocalization::getCurrentLocale()) {
                return true;
            }
        })->first();

        return ! empty($translate->translate->short_description) ? $translate->translate->short_description : "";
    }


}
