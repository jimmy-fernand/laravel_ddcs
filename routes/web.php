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
    return view('main');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('index', 'ServiceController@index')->name('service.index');

Route::get('create','ServiceController@Create')->name('service.create');

Route::post('store','ServiceController@Store')->name('service.store');

Route::get('edit/service/{id}','ServiceController@Edit');

Route::post('update/service/{id}','ServiceController@Update');

Route::get('show/service/{id}','ServiceController@Show');





Route::get('home','FrontendController@index');
