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
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all()->values('id', 'name');
        $categories = Categorie::all()->values('id', 'name');
        return view('product.create', compact('brands', 'categories'));
    }

    public function store()
    {
        // $product = Product::create(request()->all());
        // $brand = Brand::find(request()->brand_id);
        // $product->brand()->associate($brand);

        // $categorie = Categorie::find(request()->categorie_id);
        return dd($_POST);
        // $product->brand()->associate($brand);

        // $product->save();
        // return dd($product);
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
