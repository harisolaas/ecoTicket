<?php

class Categorie
{
    $guarded = ['id'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
