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
Route::get('/customer', function () {
//        $this
//
//    dd('Customer module not yen integrated.');
    return view('customer');
})->middleware('auth:customer');
//Route::get('/aw', function () {
//    $userName = Auth::user()->name;
//    $customers = \App\Customer::all();
//    dd($customers);
//});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::resource('admin/customers', 'Admin\\CustomersController');
    Route::resource('admin/categories', 'Admin\\CategoriesController');
    Route::resource('admin/services', 'Admin\\ServicesController');
    Route::resource('admin/service-providers', 'Admin\\ServiceProvidersController');
    Route::resource('admin/service-requests', 'Admin\\ServiceRequestsController');
    Route::resource('admin/transactions', 'Admin\\TransactionsController');
    Route::resource('admin/payments', 'Admin\\PaymentsController');

    Route::post('/xyz/update-request-status', function(\Illuminate\Http\Request $request){
        $id = $request->get('id');
        $requestStatus = $request->get('request_status');
        $customer = \App\Customer::findOrFail($id);
        $customer->request_status = $requestStatus;
        $customer->save();
        return redirect()->back();
    });
});
