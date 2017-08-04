<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromotionController extends Controller
{

    public function validator()
    {
        $this->validate(request(), [
            'title' => 'required|string|max:15',
            'desc' => 'required|string|max:40',
            'banner' => 'required|file|max:200|image|mimes:jpeg,png,jpg'
        ]);
    }

    public function store()
    {
        $this->validator();
        $promotion = Promotion::create([
            'title' => request()->input('title'),
            'desc' => request()->input('desc'),
            'seller_id' => request()->user()->id
        ]);

        $path = 'img/promotions/'.request()->user()->id;
        $path = request()->file('banner')->store($path);

        $promotion->banner_path = $path;
        $promotion->update();
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('seller.promotion', compact('promotion'));
    }

    public function update($id)
    {
        $promotion = Promotion::findOrFail($id);

        $this->validator();

        $path = 'img/promotions/'.request()->user()->id;
        $path = request()->file('banner')->store($path);
        $promotion->banner_path = $path;

        $promotion->update([
            'title' => request()->input('title'),
            'desc' => request()->input('desc'),
            'seller_id' => request()->user()->id
        ]);
    }

    public function delete($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
    }
}
