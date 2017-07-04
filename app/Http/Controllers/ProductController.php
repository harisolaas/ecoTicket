<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Brand;

use App\Categorie;

use App\Image;

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
        $product = Product::create(request()->all());

        $fileName = uniqid().'.'.request()->file('image')->extension();
        $path = request()->file('image')->storeAs('public/product', $fileName);
        $image = new Image;
        $image->src = $path;
        $image->product()->associate($product);
        $image->save();

        $brand = Brand::find(request()->brand_id);
        $product->brand()->associate($brand);

        $categorie = Categorie::find(request()->categorie_id);
        // $product->categories()->associate($categorie);

        $product->save();
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
