<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translate extends Model
{
    protected $appends = ['translate'];
    protected $fillable = ['table', 'table_id', 'langs_id', 'translate'];

    public function lang() {
        return $this->hasOne("App\Lang", "id", "langs_id");
    }

    public function getTranslateAttribute() {
        return json_decode($this->transalte);
    }
}
