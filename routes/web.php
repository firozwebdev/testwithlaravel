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

Route::resource('users', 'UserController');
//Route::resource('managers', 'ManagerController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){
    Route::resource('managers', 'ManagerController');
    // Route::get('admin-logout','AdminController@logout')->name('admin.logout');
    // Route::get('admin-register','AdminController@register')->name('admin.register');
    // Route::post('admin-register','AdminController@adminRegister')->name('admin.register.post');

});

Route::get('/admin/login', 'Admin\Auth\LoginController@adminLogin')->name('admin.login');
Route::post('/admin/login','Admin\Auth\LoginController@login')->name('admin.login');
