<?php

use Illuminate\Support\Facades\Auth;
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
//route group admin
// Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'dashboard\DashboardController@index')->name('dashboard.index'); 
    Route::resource('/mobil', 'mobil\MobilController');
    // routing yg sama link dan methodnya tdk boleh double di laravel 
    Route::get('/mobil/modal/{id}', 'mobil\MobilController@image_view')->name('preview.index'); 
    Route::resource('/role', 'role\RoleController');
    Route::resource('/user', 'user\UserController');
// }); 
//end route group admin

    //route group admin
    Auth::routes();

    
   

