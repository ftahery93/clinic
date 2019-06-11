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

// Login from Mobile devie

Route::post('/users/login', 'API\ApplicationUsersController@login')->name('apiusersLogin'); 

// Logout from Mobile device

Route::post('/users/logout', 'API\ApplicationUsersController@logout')->name('apiusersLogout'); 

// Register from Mobile devie

Route::post('/users/register', 'API\ApplicationUsersController@register')->name('apiusersRegister'); 

// Forgot Password 

Route::post('/users/forgot', 'API\ApplicationUsersController@forgot')->name('apiusersForgotPassword'); 

// Profile from Mobile devie

Route::post('/users/profile', 'API\ApplicationUsersController@profile')->name('apiusersProfile'); 

// Profile Edit from Mobile devie

Route::post('/users/profile/edit', 'API\ApplicationUsersController@edit')->name('apiusersProfileEdit'); 

