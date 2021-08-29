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


//Admin işlemleri.... giriş başarılı değilse-
Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/girisyap','App\Http\Controllers\Back\AuthController@login')->name('login');
    Route::post('/girisyap','App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});
//Admin işlemleri.... giriş yapmışsa
Route::prefix('admin')->middleware('isAdmin')->name('admin.')->group(function (){
    Route::get('/panel','App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    //Product Route
    Route::get('urunler/silinenler','App\Http\Controllers\Back\ProductController@trashed')->name('trashed.product');
    Route::get('urunler/harddelete/{id}','App\Http\Controllers\Back\ProductController@hardDelete')->name('hard.delete.product');
    Route::resource('urunler','App\Http\Controllers\Back\ProductController');
    Route::get('/switch','App\Http\Controllers\Back\ProductController@switch')->name('switch');
    Route::get('urunler/delete/{id}','App\Http\Controllers\Back\ProductController@delete')->name('delete.product');
    Route::get('urunler/recover/{id}','App\Http\Controllers\Back\ProductController@recover')->name('recover.product');
    //Category Route
    Route::get('/kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
    Route::post('/kategoriler/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
    Route::get('/kategori/status','App\Http\Controllers\Back\CategoryController@switch')->name('category.switch');
    Route::get('/cikisyap','App\Http\Controllers\Back\AuthController@logout')->name('logout');
});
Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('sepet','App\Http\Controllers\SepetController@index')->name('sepet');
Route::post('sepet/create','App\Http\Controllers\SepetController@create')->name('sepet.create');
Route::get('sepet/delete/{id}','App\Http\Controllers\SepetController@delete')->name('sepet.delete');
Route::get('siparis','App\Http\Controllers\SiparisController@index')->name('siparis');
Route::post('sepet/update/{id}','App\Http\Controllers\SepetController@update')->name('sepet.update');
Route::post('sepet/remove/{id}','App\Http\Controllers\SepetController@remove')->name('sepet.remove');





