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



Route::group(['prefix'=>'admin'],function (){
    Route::resource('managers', 'ManagerController');

    Route::group(['namespace'=>'Admin'], function(){

       Route::group(['middleware'=>'auth:admin'],function (){
            Route::resource('managers', 'ManagerController');
            Route::post('logout','AdminLoginController@logout')->name('admin.logout');
        });

        Route::group(['as'=>'admin.','namespace'=>'Auth'],function (){
            Route::get('/login', 'LoginController@showLoginForm')->name('login');
            Route::post('/login','LoginController@login')->name('login');
    
        });

    });
   
});



Route::group(['prefix'=>'manager',],function (){

    Route::group(['namespace'=>'Manager'], function(){

        Route::group(['middleware'=>'auth:manager'],function (){
            Route::resource('users', 'UserController');
            Route::post('logout','ManagerLoginController@logout')->name('manager.logout');
        });

        Route::group(['as'=>'manager.','namespace'=>'Auth'],function (){
            Route::get('login', 'LoginController@showLoginForm')->name('login');
            Route::post('login','LoginController@login')->name('login');
        });
    });
    
});




