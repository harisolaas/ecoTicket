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
    public function store()
    {
        $seller = Seller::make(request()->all());
        dd($seller);
        $seller->password = bcrypt($seller->password);
        $seller->save();
        return redirect('seller.login');
    }
}
