<?php

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

/* User */
Route::post('/user/login', 'API\User\AuthController@login');
Route::post('/user/register', 'API\User\AuthController@register');
Route::get('/user/logout', 'API\User\AuthController@logout');
Route::post('/user/verifyOTP', 'API\User\AuthController@verifyOTP');
Route::post('/user/resendOTP', 'API\User\AuthController@resendOTP');

/* Company */
Route::post('/company/login', 'API\User\CompanyEntryController@login');
Route::post('/company/register', 'API\User\CompanyEntryController@register');

//Profile
Route::get('/user/profile', 'API\UserProfileController@profile');
Route::post('/user/profile/update', 'API\UserProfileController@update');

//Pages
Route::get('/user/getTermsAndConditions', 'API\PagesController@getTermsAndConditions');

Route::post('/sendMail', 'API\User\AuthController@sendMail');
