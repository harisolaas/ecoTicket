<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Categorie extends Model
{
    public $guarded = ['id', 'token'];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
