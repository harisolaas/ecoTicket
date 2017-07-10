<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Buyer;

class DashboardController extends Controller
{
    public function show($id){
        $transactions = Buyer::find($id)->transactions;

        return view('dashboard', compact('transactions'));
    }
}
