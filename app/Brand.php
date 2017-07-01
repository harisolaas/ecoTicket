<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $guarded = ['id'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
