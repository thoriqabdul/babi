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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/store', 'HomeController@store')->name('store');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
Route::put('/update/{id}', 'HomeController@update')->name('update');
Route::delete('/destroy/{id}', 'HomeController@destroy')->name('destroy');

route::group(['prefix' => 'admin','middleware'=>['auth','itsAdmin']], function(){
    Route::get('/', 'AdminController@index')->name('admin.index');
    // Route::get('/home', 'HomeController@index')->name('home');
});




route::group(['middleware'=>['auth']], function(){
    Route::get('/', 'ClientController@index')->name('client.index');
});
