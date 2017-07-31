<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function store()
    {

    }

    public function validator()
    {
        $this->validate(request(), [
            'title' => 'required|string|max:15',
            'desc' => 'required|string|max:40',
            'banner_path' => 'required|string'
        ]);
    }

}
