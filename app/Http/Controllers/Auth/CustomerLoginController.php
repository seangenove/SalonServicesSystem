<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
//    public function index(){
//        return view('customer');
//    }
    public function __construct(){
        $this->middleware('guest:customer');
    }
    public function showLoginForm(){
        return view('auth.customer-login');
    }
    //
    public function login(Request $request){
//        return true;

        // validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to log the user in
        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // if successful, then redirect to their intended location
            return redirect()->intended(route('customer.dashboard'));
        }

        // if unsuccessful, then redirect to back to login
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
