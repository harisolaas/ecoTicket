<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller
{
    public $guarded = ['id', 'token'];

    public $timestamps = false;

    public function create()
    {
        return view('brand.create');
    }

    public function store()
    {
        $brand = Brand::create(request()->all());
    }
}
