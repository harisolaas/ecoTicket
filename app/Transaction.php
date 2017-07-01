<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    $guarded = ['id', 'dt'];

    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
}
