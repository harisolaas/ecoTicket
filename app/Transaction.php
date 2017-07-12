<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $guarded = ['id', 'dt'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
}
