<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public $guarded = ['id'];

    public $timestamps = false;

    public function buyers()
    {
        return $this->belongsToMany('App\Buyer');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
