<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['seller_id', 'title', 'desc', 'banner_path'];

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }
}
