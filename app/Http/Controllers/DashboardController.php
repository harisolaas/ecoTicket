<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;

class DashboardController extends Controller
{
    public function show($id){
        $transactions = User::find($id)->transactions()->paginate(10);

        return view('dashboard', compact('transactions'));
    }
}
