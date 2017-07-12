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
Route::get('/', function () {
    return view('index');
});

Route::get('products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
// Route::get('products/{id}', 'ProductController@show');
Route::post('products', 'ProductController@store');

Route::get('categories/create', 'CategorieController@create');
Route::post('categories', 'CategorieController@store');

Route::get('brands/create', 'BrandController@create');
Route::post('brands', 'BrandController@store');

Route::get('my-ecoticket/{id}', 'DashboardController@show');

Route::get('new-ecoticket', 'RouteController@newTk');

/*
public function getLogin($uri)
    {
        return view('front.clientes.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = ['password' => $request->pass, 'email' => $request->email];
        if (Auth::guard('clientes')->attempt($credentials)) {
            return redirect('web.uri.clientes');
        } else {
            $request->session()->flash('error', 'El usuario o la contraseña son incorrectos.');
            return redirect('web.uri.ingresar');
        }
    }

    public function logout()
    {
        Auth::guard('clientes')->logout();
        return redirect('web.uri.ingresar');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente($request->all());
        $cliente->password = bcrypt($request->input('password'));
        $cliente->save();
        return redirect('admin/clientes#new');
    }


*/


// index
// show
// create
// delete
// edit
// update

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
