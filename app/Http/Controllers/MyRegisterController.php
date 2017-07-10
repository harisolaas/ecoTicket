<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Buyer;

class MyRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function checkEmailAvailability()
    {
        $res = (Buyer::where('email', request()->email)->first()) ? true : false;
        print json_encode($res);
    }

    public function register()
    {
        print 'llego';
    }
}
