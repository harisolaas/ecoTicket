<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Seller;

class RequestsController extends Controller
{
    public function usersCount()
    {
        print User::count();
    }
    public function checkEmailAvailability()
    {
        if (request()->source == '/seller/register') {
            $res = boolval(Seller::where('email', request()->email)->first());
        }else {
            $res = boolval(User::where('email', request()->email)->first());
        }
        $res = json_encode($res);
        print $res;
    }
}
