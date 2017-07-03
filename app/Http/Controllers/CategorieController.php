<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorie;

class CategorieController extends Controller
{
    public function create()
    {
        return view('categorie.create');
    }

    public function store()
    {
        $categorie = Categorie::create(request()->all());
        $categorie->save();
    }
}
