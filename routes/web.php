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
// Route::get('event','EventController@index');
// Route::get('event/create','EventController@create');
// Route::get('event/{id}','EventController@show');
// Route::post('event','EventController@store');
// Route::delete('event/{id}','EventController@del');
// Route::get('event/edit/{id}','EventController@edit');
// Route::put('event/{id}','EventController@editEvent');

Route::resource('product-ajax','ProductController');
Route::resource('event-ajax','EventAjaxController');