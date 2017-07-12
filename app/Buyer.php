<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    public $guarded = ['id'];

    public $timestamps = false;

    public function sellers()
    {
        return $this->hasMany('App\Seller');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
