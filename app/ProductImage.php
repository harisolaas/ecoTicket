<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $guarded = ['id'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
