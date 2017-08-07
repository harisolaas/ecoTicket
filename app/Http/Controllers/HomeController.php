<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Promotion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = request()->user()->transactions()->paginate(10);

        $sellers = request()->user()->transactions()->pluck("seller_id")->toArray();
        $grouped_promotions = Promotion::whereIn('seller_id', $sellers)->where('active', '=', 1)->get()->chunk(4);

        return view('home', compact('transactions', 'grouped_promotions'));
    }
}
