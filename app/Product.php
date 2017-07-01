<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $guarded = ['id', 'token'];

    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function buyers()
    {
        return $this->belongsToMany('App\Buyer');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categorie');
    }

    public function sellers()
    {
        return $this->hasMany('App\Seller');
    }

    public function transactions()
    {
        return $this->belongsToMany('App\Transaction');
    }


}
