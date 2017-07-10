<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Buyer;

class DashboardController extends Controller
{
    public function show($id){
        $transactions = Buyer::find($id)->transactions()->paginate(10);

        return view('dashboard', compact('transactions'));
    }
}
