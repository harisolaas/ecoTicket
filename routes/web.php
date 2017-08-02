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

Route::get('/', function ()
{
    return view('index');
});
Route::get('/test', function ()
{
    $transaction = App\Transaction::find(1);
    $pdf = PDF::loadView('pdf.ticket', compact('transaction'));
    return $pdf->stream();
});
Route::prefix('seller')->group(function ()
{
    Route::get('/register', 'Auth\SellerRegisterController@show');
    Route::post('/register', 'Auth\SellerRegisterController@store');

    Route::get('/login', 'Auth\SellerLoginController@showLoginForm')->name('seller.login');
    Route::post('/login', 'Auth\SellerLoginController@login');
    Route::get('/home/{section}', 'SellerController@index')->name('seller.home');

    Route::post('/send-ticket', 'TransactionController@storeAndSend')->middleware('auth:seller');
    Route::post('/new-prom', 'PromotionController@store')->middleware('auth:seller');

    Route::get('/test-datos', 'Seller\DashboardController@datos');
    Route::get('/test-mail', function ()
    {
        dd(request()->path());
    });
});

Auth::routes();

Route::post('/user/set-active', 'Auth\RegisterController@setActive');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('request/product', 'RequestsController@getProduct');

Route::get('checkEmailAvailability', 'RequestsController@checkEmailAvailability');

Route::prefix('file')->group(function ()
{
    Route::get('/print/{transaction_id}', 'FileController@printTicket')->middleware('auth:web');
    Route::get('/download/{transaction_id}', 'FileController@downloadTicket')->middleware('auth:web');
});

Route::get('products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
// Route::get('products/{id}', 'ProductController@show');
Route::post('products', 'ProductController@store');

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
