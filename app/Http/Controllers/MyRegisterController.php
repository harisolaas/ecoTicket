<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserType;

class MyRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $usertypes = UserType::all();
        return view('auth.register', compact('usertypes'));
    }

    public function checkEmailAvailability()
    {
        $res = (User::where('email', request()->email)->first()) ? true : false;
        print json_encode($res);
    }

    public function register()
    {
        print 'llego';
    }
}
