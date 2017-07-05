<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    public $fillable = ['name'];

    public $timestamps = false;

    function users()
    {
        $this->belongsToMany('App\User');
    }
}
