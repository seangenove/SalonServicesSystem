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
    return view('homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::resource('admin/customers', 'Admin\\CustomersController');
    // redirect to original page after login
//    if (Auth::guest()) {
//        return redirect()->guest('login');
//    }
    Route::post('/xyz/update-new', function(\Illuminate\Http\Request $request){
        $id = $request->get('id');
//    dd($ft_id);
        $requestStatus = $request->get('requestStatus');
        $customer = \App\Customer::findOrFail($id);
        $customer->requestStatus = $requestStatus;
        $customer->save();
        return redirect()->back();
    });
});

Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/services', 'Admin\\ServicesController');
Route::resource('admin/services', 'Admin\\ServicesController');