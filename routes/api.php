<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResources(['user' => 'API\UserController']);

Route::get('profile','API\UserController@profile');
Route::get('findUser','API\UserController@search');
Route::put('profile','API\UserController@updateProfile');
Route::get('android','API\UserController@profilandroid');
Route::get('qrshow','API\TargetController@qrView');


Route::apiResources(['target' => 'API\TargetController']);

//Route::get('selectuser','API\MessageController@seluser');
Route::apiResources(['messages' => 'API\MessageController']);
//Route::get('/api/messages/{id}', 'API\MessageController@show');
//Route::delete('/destroy/messages/{id}','API\MessageController@destroy'); 


Route::apiResources(['notifications' => 'API\NotificationsController']);
Route::get('notificaciones','API\NotificationsController@unRead');

Route::patch('notificaciones/{id}','API\NotificationsController@read');


