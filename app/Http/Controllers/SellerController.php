<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:seller');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($section)
    {
        $transactions = request()->user()->transactions;
        $promotions = '';

        switch ($section)
        {
            case 'new-ticket':
                $view = 'seller.create-ticket';

                break;

            case 'all-tickets':
                $view = 'seller.all-tickets';

                break;

            case 'promotions':
                $view = 'seller.promotions';
                $promotions = request()->user()->promotions;

                break;

            default:
                $view = 'seller.home';

                break;
        }

        return view($view, compact('transactions', 'promotions'));
    }
}
