<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $guarded = ['id', 'token'];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
