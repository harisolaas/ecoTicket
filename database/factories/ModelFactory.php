<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Brand::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Categorie::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'barcode' => $faker->ean8,
        'name' => $faker->name,
        'short_desc' => $faker->sentence(6, true),
        'long_desc' => $faker->paragraph(1, true),
        'price' => $faker->randomFloat(2, 0, 1000),
        'brand_id' => App\Brand::find(rand(1,15)),
        //'categorie_id' => App\Categorie::find(rand(1,15)),
    ];
});

$factory->define(App\ProductImage::class, function (Faker\Generator $faker) {
    return [
        'name' => 'ecoticket_logo.jpg',
        'src' => 'http://localhost/img/ecoticket_logo.jpg',
    ];
});

$factory->define(App\Seller::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Transaction::class, function(Faker\Generator $faker){
    return [
        'user_id' => App\User::find(
            rand(1, App\User::count())
        ),
        'seller_id' => App\Seller::find(
            rand(1, App\Seller::count())
        ),
        'total_amount' => 0,
        'created_at' => $faker->dateTimeThisMonth('now', date_default_timezone_get()),
    ];
});
