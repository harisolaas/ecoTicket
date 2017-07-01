<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Brand;

use App\Categorie;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // dd($products[0]);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all()->values('id', 'name');
        return view('product.create', compact('brands'));
    }

    public function store()
    {
        $product = Product::create(request()->all());
        $categorie = Brand::find(request()->brand_id);
        $product->brand()->associate($categorie);
        $product->save();
        return dd($product);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }
}
