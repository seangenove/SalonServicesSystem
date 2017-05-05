<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerLoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.customer-login');
    }
    //
    public function login(){
        return true;
    }
}
