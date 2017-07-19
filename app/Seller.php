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

    public function getSalesByDay()
    {
        $transactions = $this->transactions
            ->sortBy('created_at')
            ->groupBy( function($transaction){
                return $transaction->created_at->format('Y-m-d');
            })
            ->map(function($transByDayCol){
                return $transByDayCol->sum('total_amount');
            })
            ->toArray();
        $data = $transactions;
        return $data;
    }
}
