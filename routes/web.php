<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
// Route::get('products/{id}', 'ProductController@show');
Route::post('products', 'ProductController@store');
// Route::post('products/{id}/edit', 'ProductController@edit');
// Route::post('products/{id}', 'ProductController@update');

Route::get('categories/create', 'CategorieController@create');
Route::post('categories', 'CategorieController@store');

Route::get('brands/create', 'BrandController@create');
Route::post('brands', 'BrandController@store');

Route::get('my-ecoticket', 'RouteController@dashboard');

Route::get('new-ecoticket', 'RouteController@newTk');




// index
// show
// create
// delete
// edit
// update
