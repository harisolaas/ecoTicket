<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public $guarded = ['id'];

    public $fillable = ['name', 'email', 'password', 'type'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\User');
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
