<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//Route::resource('users', 'UserController');
//Route::resource('managers', 'ManagerController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){
    Route::resource('managers', 'ManagerController');
    Route::post('logout','Admin\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['prefix'=>'manager','middleware'=>'auth:manager'],function (){
    Route::resource('users', 'UserController');
    Route::post('logout','Manager\ManagerLoginController@logout')->name('manager.logout');
});

Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Admin\Auth\LoginController@login')->name('admin.login');

Route::get('/manager/login', 'Manager\Auth\LoginController@showLoginForm')->name('manager.login');
Route::post('/manager/login','Manager\Auth\LoginController@login')->name('manager.login');
