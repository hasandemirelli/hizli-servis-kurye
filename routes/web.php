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

Route::get('/','Front\Homepage@index')->name('homepage');
Route::post('/query','Front\Homepage@query')->name('query');

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/
Route::prefix('/cms')->middleware('isLogin')->group(function (){
    Route::get('/giris-yap','Back\Homepage@login')->name('login');
    Route::post('/login','Back\Homepage@loginControl')->name('login-control');
});
Route::prefix('/cms')->middleware('isAuth')->group(function (){
    Route::get('','Back\Homepage@index')->name('cms');
    Route::get('/yeni-gonderi-ekle','Back\Homepage@addPosts')->middleware('isManager')->name('add-post-view');
    Route::get('/gelen-gonderiler','Back\Homepage@incomingPosts');
    Route::get('/alinan-gonderiler','Back\Homepage@receivedPosts');
    Route::get('/dagitimdaki-gonderiler','Back\Homepage@deliveryPosts');
    Route::get('/teslim-edilen-gonderiler','Back\Homepage@deliveredPosts');
    Route::get('/print/{id}','Back\Homepage@print');
    Route::get('/received/{id}','Back\Homepage@received');
    Route::get('/delivery/{id}','Back\Homepage@delivery');
    Route::post('/delivered','Back\Homepage@delivered');
    Route::get('/musteriler','Back\Homepage@customers')->middleware('isManager');
    Route::post('/add-customer','Back\Homepage@addCustomerController')->middleware('isManager')->name('add-customer-controller');
    Route::get('/gonderiler','Back\Homepage@posts')->middleware('isManager');
    Route::post('/add-post','Back\Homepage@addPostController')->middleware('isManager')->name('add-post-controller');
    Route::get('/kullanicilar','Back\Homepage@users')->middleware('isAdmin');
    Route::post('/add-user','Back\Homepage@register')->middleware('isAdmin')->name('add-user-controller');
    Route::get('/slaytlar','Back\Homepage@slides')->middleware('isAdmin');
    Route::post('/add-slide','Back\Homepage@addSlideController')->middleware('isAdmin')->name('add-slide-controller');
    Route::get('/logout','Back\Homepage@logout');
});
