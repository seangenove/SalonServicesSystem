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
Route::get('/aw', function(){

});


Route::get('/', function () {
    return view('homepage');
});
Route::get('/customer', function () {
//        $this
//
//    dd('Customer module not yen integrated.');
    return view('customer');
})->middleware('auth:customer');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/admin', function () {
        $categories = \App\Category::all();
        $services = \App\Service::all();

        return view('admin.dashboard')
            ->with('categories', $categories)
            ->with('services', $services);
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
        $table= $request->get('table');
        $requestStatus = $request->get('request_status');

        if($table == "service_providers"){
            $user = \App\ServiceProvider::findOrFail($id);
        } else{
            $user = \App\Customer::findOrFail($id);
        }

        $user->request_status = $requestStatus;
        $user->save();
        return redirect()->back();
    });

    Route::post('/xyz/update-all', function(\Illuminate\Http\Request $request){
        $table = $request->get('table');

        if($table == "service_providers"){
            $users = \App\ServiceProvider::all()->where('request_status', 'pending');
        } else{
            $users = \App\Customer::all()->where('request_status', 'pending');
        }

        foreach ($users as $user){
            $user->request_status = 'accepted';
            $user->save();
        }

        return redirect()->back();
    });
});
