<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function newTk()
    {
        return view('ecoticket-builder');
    }

    public function newProd()
    {
        return view('create-product');
    }
}
