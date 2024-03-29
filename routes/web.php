<?php

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

Route::group(['middleware' => ['auth']], function() {
    Route::get('post-press','Postpress\PostPressController@index')->name('post-press');
    Route::post('post-press','Postpress\PostPressController@SaveRecord')->name('saveRecord');
    Route::get('post-press/confirm','Postpress\PostPressController@confirmRecord')->name('confirmRecord');
});
