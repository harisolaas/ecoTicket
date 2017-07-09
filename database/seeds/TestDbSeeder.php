<?php

use Illuminate\Database\Seeder;
use App\Brand;
use App\Categorie;

class TestDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Brand::class, 15)->create();
        //factory(App\Categorie::class, 15)->create();
        factory(App\Product::class, 100)->create()->each(function ($p) {
            $img = factory(App\ProductImage::class)->make();
            $img->product()->associate($p);
            $img->save();
        });
        factory(App\Buyer::class, 100)->create();
        factory(App\Seller::class, 100)->create();
        factory(App\Transaction::class, 50)->create()->each(function($t){
            //for ($i=0; $i < rand(1,15) ; $i++) {
                $p=App\Product::find(rand(1, App\Product::count()));
                $t->products()->attach($p->id);
            //}
            $t->save();
        });
    }
}
