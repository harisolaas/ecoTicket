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
use App\Mail\Ticket;

Route::get('/', function ()
{
    return view('index');
});
Route::get('/test', function ()
{
    Mail::to('h.solaas1@gmail.com')->queue(new Ticket(App\Transaction::find(1)));
    dd('llegué');
});
Route::prefix('seller')->group(function ()
{
    Route::get('/register', 'Auth\SellerRegisterController@show');
    Route::post('/register', 'Auth\SellerRegisterController@store');

    Route::get('/login', 'Auth\SellerLoginController@showLoginForm')->name('seller.login');
    Route::post('/login', 'Auth\SellerLoginController@login');
    Route::get('/home', 'SellerController@index')->name('seller.home');
    Route::get('/home/{section}', 'SellerController@section')->middleware('auth:seller');

    Route::post('/send-ticket', 'TransactionController@storeAndSend')->middleware('auth:seller');

    Route::post('/promotion/create', 'PromotionController@store')->middleware('auth:seller');
    Route::post('/promotion/toggle', 'PromotionController@toggle')->middleware('auth:seller');
    Route::post('/promotion/delete', 'PromotionController@delete')->middleware('auth:seller');
    Route::get('/home/promotion/{id}', 'PromotionController@edit')->middleware('auth:seller');
    Route::post('/promotion/{id}', 'PromotionController@update')->middleware('auth:seller');

    // Route::get('/home/products', 'ProductController@index')->middleware('auth:seller');
    // Route::get('products/create', 'ProductController@create')->middleware('auth:seller');
    // // Route::get('products/{id}', 'ProductController@show');
    // Route::post('products', 'ProductController@store')->middleware('auth:seller');

    Route::get('/test-datos', 'Seller\DashboardController@datos');
    Route::get('/test', function ()
    {

    });
});

Auth::routes();

Route::post('/user/set-active', 'Auth\RegisterController@setActive');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/shops', 'HomeController@sellers')->middleware('auth:web');

Route::get('request/product', 'RequestsController@getProduct');

Route::get('checkEmailAvailability', 'RequestsController@checkEmailAvailability');
Route::get('/download/{transaction_id}', 'FileController@downloadTicket')->middleware('auth:web');


Route::prefix('file')->group(function ()
{
    Route::get('/print/{transaction_id}', 'FileController@printTicket')->middleware('auth:web');
});

Route::get('promotion/{id}', 'PromotionController@show')->middleware('auth:web');


Route::get('categories/create', 'CategorieController@create');
Route::post('categories', 'CategorieController@store');

Route::get('brands/create', 'BrandController@create');
Route::post('brands', 'BrandController@store');

// index
// show
// create
// delete
// edit
// update
