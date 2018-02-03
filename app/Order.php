<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getCartAttribute($value) {
        return json_decode($value);
    }
}
