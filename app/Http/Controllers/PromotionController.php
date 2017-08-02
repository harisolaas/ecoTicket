<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromotionController extends Controller
{
    public function store()
    {
        $this->validator();
        $prom = Promotion::create([
            'title' => request()->input('title'),
            'desc' => request()->input('desc'),
            'seller_id' => request()->user()->id
        ]);

        $path = 'img/promotions/'.request()->user()->id;
        $path = request()->file('banner')->storeAs($path, $prom->id);

        $prom->banner_path = $path;
        $prom->update();
    }

    public function validator()
    {
        $this->validate(request(), [
            'title' => 'required|string|max:15',
            'desc' => 'required|string|max:40',
            'banner' => 'required|file|max:200|image|mimes:jpeg,png,jpg'
        ]);
    }

}
