<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use \App\Models\User;
use \App\Models\Admin;
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

Route::group(['middleware' => 'auth:admin'],function (){
    Route::get('/' , 'HomeController@index')->name('home');
    Route::get('/home' , 'HomeController@index');
    Route::get('/logout' , 'AuthController@logout')->name('logout');
    Route::resource('/profile' , 'SettingController');
    Route::post('/profile/deal' , 'SettingController@deal')->name('profile.deal');
    Route::post('/profile/faqs' , 'SettingController@faqs')->name('profile.faqs');
    Route::post('/profile/insta' , 'SettingController@insta')->name('profile.insta');
    Route::post('/profile/partner' , 'SettingController@partner')->name('profile.partner');
    Route::post('/profile/header' , 'SettingController@header')->name('profile.header');
    Route::post('/profile/changepass' , 'SettingController@changepass')->name('profile.changepass');

//    Category
    Route::resource('/categories' , 'CategoryController');

//    blog
    Route::resource('/blog' , 'BlogController');

//    Product
    Route::resource('/products' , 'ProductController');


//    Order
    Route::resource('/orders' , 'OrderController');

});

Route::group(['middleware' => 'guest:admin'],function (){
    Route::get('/login' , 'AuthController@loginForm')->name('loginForm');
    Route::post('/login' , 'AuthController@login')->name('login');
});
