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

Route::get('/map', function () {
    return view('map');
});

Route::get('/clock', function () {
    return view('clock');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('messages/{id}', 'API\MessageController@show');
//Route::get('/api/messages/{id}', 'API\MessageController@show');

Route::get('{path}',"HomeController@index")->where('path','[\/\w\.-]*');

Route::patch('notificaciones/{id}','API\NotificationsController@read');