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



Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/girisyap','App\Http\Controllers\Back\AuthController@login')->name('login');
    Route::post('/girisyap','App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});
//Admin işlemleri....
Route::prefix('admin')->middleware('isAdmin')->name('admin.')->group(function (){
    Route::get('/panel','App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    Route::get('/cikisyap','App\Http\Controllers\Back\AuthController@logout')->name('logout');
});
Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('sepet','App\Http\Controllers\SepetController@index')->name('sepet');
Route::post('sepet/create','App\Http\Controllers\SepetController@create')->name('sepet.create');
Route::get('sepet/delete/{id}','App\Http\Controllers\SepetController@delete')->name('sepet.delete');
Route::get('siparis','App\Http\Controllers\SiparisController@index')->name('siparis');



