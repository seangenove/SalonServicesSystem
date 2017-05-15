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

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/admin', function () {
//        $noOfServices = \App\Service::all()->count();
        $noOfTransactions = \App\Transaction::all()->count();
        $noOfServiceRequests = \App\ServiceRequest::all()->count();
        $noOfSPRequests = \App\ServiceProvider::all()
            ->where('request_status', 'pending')->count();
        $noOfCustomerRequests = \App\Customer::all()
            ->where('request_status', 'pending')->count();
        $noOfServiceProviders = \App\ServiceProvider::all()->count();
        $noOfCustomers = \App\Customer::all()->count();

        return view('admin.dashboard')
            ->with('noOfTransactions', $noOfTransactions)
            ->with('noOfServiceRequests', $noOfServiceRequests)
            ->with('noOfSPRequests', $noOfSPRequests)
            ->with('noOfCustomerRequests', $noOfCustomerRequests)
            ->with('noOfServiceProviders', $noOfServiceProviders)
            ->with('noOfCustomers', $noOfCustomers);
    });

    Route::resource('admin/customers', 'Admin\\CustomersController');
    Route::resource('admin/categories', 'Admin\\CategoriesController');
    Route::resource('admin/services', 'Admin\\ServicesController');
    Route::resource('admin/service-providers', 'Admin\\ServiceProvidersController');
    Route::resource('admin/service-requests', 'Admin\\ServiceRequestsController');
    Route::resource('admin/transactions', 'Admin\\TransactionsController');
    Route::resource('admin/payments', 'Admin\\PaymentsController');
    Route::resource('admin/visits', 'Admin\\VisitsController');

    Route::post('/xyz/update-request-status', function(\Illuminate\Http\Request $request){
        $id = $request->get('id');
        $table = $request->get('table');
        $requestStatus = $request->get('request_status');

//        dd($table);
        if($table == "service_providers"){
            $user = \App\ServiceProvider::findOrFail($id);
            $role = 'service provider';
        } else{
//            dd(\App\Customer::all()->where('id', $id));
//            dd($id);
            $user = \App\Customer::findOrFail($id);
            $role = 'customer';
        }

        $user->request_status = $requestStatus;
        $user->save();

        // all users in Users Table

        if($requestStatus == 'accepted'){
            $auth_users = \App\User::all();

            $new_user = new \App\User();

            foreach ($auth_users as $auth_user){
                if(!($user->email == $auth_user->email)){
                    $new_user->name = $user->last_name.", ".$user->first_name;
                    $new_user->email = $user->email;
                    $new_user->password = bcrypt($user->password);
                    $new_user->role = $role;
                    $new_user->user_id = $user->id;
                    $new_user->save();
                }
            }
        }

        return redirect()->back();
    });

    Route::post('/xyz/update-all', function(\Illuminate\Http\Request $request){
        $table = $request->get('table');

        if($table == "service_providers"){
            $users = \App\ServiceProvider::all()->where('request_status', 'pending');
            $role = 'service provider';
        } else{
            $users = \App\Customer::all()->where('request_status', 'pending');
            $role = 'customer';
        }

        if (!($users->count() == 0)){
            foreach ($users as $user){
                $user->request_status = 'accepted';
                $user->save();
                $new_user = new \App\User();
                $new_user->name = $user->last_name.", ".$user->first_name;
                $new_user->email = $user->email;
                $new_user->password = bcrypt($user->password);
                $new_user->role = $role;
                $new_user->user_id = $user->id;
                $new_user->save();
            }
        }else{
            dd();
        }

        return redirect()->back();
    });
});

Route::post('/register-sp', function(\Illuminate\Http\Request $request){
    $requestData = $request->all();
    \App\ServiceProvider::create($requestData);

    \Illuminate\Support\Facades\Session::flash('flash_message', 'ServiceProvider added!');

    return redirect('admin/service-providers');
});

Route::post('/register-cus', function(\Illuminate\Http\Request $request){
    $requestData = $request->all();
    \App\ServiceProvider::create($requestData);

    \Illuminate\Support\Facades\Session::flash('flash_message', 'ServiceProvider added!');

    return redirect('admin/service-providers');
});

Route::get('/customer', function(){
    $id = \Illuminate\Support\Facades\Auth::user()->user_id;
    $ip_address = 'localhost';

    return redirect(url('http://'.$ip_address.':3000?id='.$id));
});

Route::get('/service-provider', function(){
    $id = \Illuminate\Support\Facades\Auth::user()->user_id;
    $ip_address = 'localhost';

    return redirect(url('http://'.$ip_address.':8080/WebTek/request.htm/?id='.$id));
});

Route::get('/user-logout', function(){
    \Illuminate\Support\Facades\Auth::logout();

    return view('homepage');
});
