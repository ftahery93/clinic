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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

//Route::resource('registeredUsers', 'Admin\RegisteredUserController');
//Route::get('registeredUsers', 'API\RegisteredUserController@index');

//Authentication 
Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');
Route::get('logout', 'API\AuthController@logout');
Route::post('verifyOTP', 'API\AuthController@verifyOTP');
Route::post('resendOTP', 'API\AuthController@resendOTP');

//User Profile
Route::get('profile', 'API\UserProfileController@profile');
Route::post('profile/update', 'API\UserProfileController@update');
 
