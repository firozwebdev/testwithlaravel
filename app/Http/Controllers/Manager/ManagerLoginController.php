<?php

namespace App\Http\Controllers\Manager;

use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerLoginController extends Controller
{
    public function logout(){
        Auth::guard('manager')->logout();
        return redirect()->route('manager.login');
    }
    // public function dashboard(){
    //     return view('admin.dashboard');
    // }
    // public function register(){
    //     return view('admin.auth.register');
    // }
    // public function adminRegister(Request $request){
    //     $request->validate([
    //         'email'=>'required|unique:admins',
    //         'password'=>'required',
    //         'password_confirmation'=>'same:password'
    //     ]);
    //     unset($request['password_confirmation']);
    //     $password = Hash::make($request->password);
    //     $request['password'] = $password;
    //    Admin::create($request->all());
    // }
}
