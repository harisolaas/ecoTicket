<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function show()
    {
        return view('seller.login');
    }
    public function login()
    {
        $credentials = ['password' => request()->pass, 'email' => request()->email];
        if (Auth::guard('clientes')->attempt($credentials)) {
            return redirect('seller.home');
        } else {
            request()->session()->flash('error', 'El usuario o la contraseña son incorrectos.');
            return redirect('seller.login');
        }
    }
    public function logout()
    {
        Auth::guard('sellers')->logout();
        return redirect('seller.login');
    }

}
