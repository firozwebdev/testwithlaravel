<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::MANAGER_HOME;

   

    public function showLoginForm(){
        return view('manager.auth.login');
    }

    // public function login(Request $request){
    //     dd($request->all());
    // }
    protected function guard()
    {
        return Auth::guard('manager');
    }

}