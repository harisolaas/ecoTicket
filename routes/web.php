<?php
use Barryvdh\DomPDF\Facade;
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
Route::get('/print/{transaction_id}', 'FileController@printTicket');
Route::get('/download/{transaction_id}', 'FileController@downloadTicket');

Route::get('products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
// Route::get('products/{id}', 'ProductController@show');
Route::post('products', 'ProductController@store');

Route::get('categories/create', 'CategorieController@create');
Route::post('categories', 'CategorieController@store');

Route::get('brands/create', 'BrandController@create');
Route::post('brands', 'BrandController@store');

Route::get('new-ecoticket', 'RouteController@newTk');

Route::get('seller/home', function (){
    return redirect('seller/login');
});
Route::get('seller/register', 'Auth\Seller\RegisterController@show');
Route::post('seller/register', 'Auth\Seller\RegisterController@store');
Route::get('seller/login', 'Auth\Seller\LoginController@show');
Route::post('seller/login', 'Auth\Seller\LoginController@login');
Route::get('seller/test', 'Seller\DashboardController@show');
Route::get('seller/test-datos', 'Seller\DashboardController@datos');
Route::get('seller/topProducts', 'Seller\DashboardController@topProducts');
Route::get('seller/test-ticket-gen', function ()
{
    return view('seller._generate-ticket');
});

Route::get('request/product', 'RequestsController@getProduct');

Route::get('checkEmailAvailability', 'RequestsController@checkEmailAvailability');



// index
// show
// create
// delete
// edit
// update

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
