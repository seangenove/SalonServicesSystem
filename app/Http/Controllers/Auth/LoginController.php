<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected $redirectTo = '/admin';
//    protected function redirectTo(){
//        $userName = Auth::attempt()->name;
//        dd($userName);
////        $serviceProvider = ServiceProvider::all();
//        $customers = Customer::all();
//        if($userName == 'admin'){
//            return '/admin';
//        } else{
//            foreach ($customers as $customer){
//                if($userName == $customer->name && $customer->requestStatus == 'accepted'){
//                    return '/customer';
//                }
//            }
//
////            foreach ($serviceProviders as $serviceProvider){
////                if($userName == $serviceProvider->name  && $serviceProvider->requestStatus == 'accepted'){
////                    return '/service-provider';
////                }
////            }
//        }
//
//        return '/path';
//    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function username()
    {
        return 'email';
    }

//    protected function authenticated(Request $request, $user)
//    {
//        //        $serviceProvider = ServiceProvider::all();
//        $email = $user->email;
//        $customers = Customer::all();
//        if($email == 'admin@salonpas.com'){
//            redirect('/admin');
//        } else{
//            foreach ($customers as $customer){
//                if($email == $customer->email && $customer->requestStatus == 'accepted'){
//                    redirect('/customers');
//                }
//            }
//
////            foreach ($serviceProviders as $serviceProvider){
////                if($userName == $serviceProvider->name  && $serviceProvider->requestStatus == 'accepted'){
////                    return '/service-provider';
////                }
////            }
//        }
//    }
}
