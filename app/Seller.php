<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;

class Seller extends Authenticable
{
    protected $guarded = 'seller';

    protected $fillable = ['name', 'email', 'password', 'type'];

    public $timestamps = false;

    protected $hidden = ['password', 'remember_token'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function promotions()
    {
        return $this->hasMany('App\Promotion');
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
