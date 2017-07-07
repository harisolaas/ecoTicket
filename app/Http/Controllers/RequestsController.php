<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RequestsController extends Controller
{
    public function usersCount()
    {
        print User::count();
    }
}
