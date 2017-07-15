<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Seller;

class RegisterController extends Controller
{
    public function show()
    {
        return view('seller.register');

    }

    public function validator()
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    public function store()
    {
        $this->validator();
        $seller = Seller::make(request()->all());
        $seller->password = bcrypt($seller->password);
        $seller->save();
        // return redirect('seller/login');
    }
    protected function redirectTo()
    {
        return '/seller/login';
    }
}
