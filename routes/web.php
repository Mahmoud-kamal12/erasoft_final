<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
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

//Route::get('create-transaction', [\App\Http\Controllers\PayPalPaymentController::class, 'createTransaction'])->name('createTransaction');
//Route::get('process-transaction', [\App\Http\Controllers\PayPalPaymentController::class, 'processTransaction'])->name('processTransaction');
//Route::get('success-transaction', [\App\Http\Controllers\PayPalPaymentController::class, 'successTransaction'])->name('successTransaction');
//Route::get('cancel-transaction', [\App\Http\Controllers\PayPalPaymentController::class, 'cancelTransaction'])->name('cancelTransaction');


//Route::prefix('facebook')->name('facebook.')->group( function(){
//    Route::get('auth', [\App\Http\Controllers\FaceBookController::class, 'loginUsingFacebook'])->name('login');
//    Route::get('callback', [\App\Http\Controllers\FaceBookController::class, 'callbackFromFacebook'])->name('callback');
//});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/faqs', 'HomeController@faqs')->name('faqs');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/login', 'AuthController@loginForm')->middleware('guest:web')->name('loginForm');
Route::get('/register', 'AuthController@registerForm')->middleware('guest:web')->name('registerForm');
Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::get('/blog-details/{slug}', 'HomeController@blogdetails')->name('blog-details');
Route::post('/message', 'HomeController@message')->name('message');

Route::post('/loginR', 'AuthController@login')->middleware('guest:web')->name('login');
Route::post('/registerR', 'AuthController@register')->middleware('guest:web')->name('register');


Route::group(['middleware' => 'auth:web'] , function (){
    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::post('/addtocart/{id}', 'HomeController@addtocart')->name('addtocart');
    Route::post('/updatecart', 'HomeController@updatecart')->name('updatecart');
    Route::post('/removecart', 'HomeController@removecart')->name('removecart');
    Route::post('/checkout', 'HomeController@checkout')->name('checkout');
    Route::get('/cart', 'HomeController@cart')->name('cart');
    Route::get('/check', 'HomeController@check')->name('check');
});

