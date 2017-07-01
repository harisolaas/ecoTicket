<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    $guarded = ['id'];

    $timestamps = false;

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function sellers()
    {
        return $this->hasMany('App\Seller');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
