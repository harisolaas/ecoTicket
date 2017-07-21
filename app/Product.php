<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $guarded = ['id', 'token', 'image'];

    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Categorie');
    }

    public function sellers()
    {
        return $this->hasOne('App\Seller');
    }

    public function transactions()
    {
        return $this->belongsToMany('App\Transaction');
    }

    public function productImage()
    {
        return $this->hasOne('App\ProductImage');
    }


}
