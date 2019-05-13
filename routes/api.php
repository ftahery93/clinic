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
Route::post('/company/login', 'API\Company\CompanyEntryController@login');
Route::post('/company/register', 'API\Company\CompanyEntryController@register');
Route::get('/company/getProfile', 'API\Company\CompanyProfileController@getProfile');
Route::get('/company/getCompanyDetails', 'API\Company\CompanyProfileController@getCompanyDetails');
Route::get('/company/getPendingShipments', 'API\Company\ShipmentController@getPendingShipments');
Route::get('/company/getMyShipments', 'API\Company\ShipmentController@getMyShipments');
Route::get('/company/acceptShipment', 'API\Company\ShipmentController@acceptShipment');

//Profile
Route::get('/user/profile', 'API\User\UserProfileController@profile');
Route::post('/user/profile/update', 'API\User\UserProfileController@update');

//Pages
Route::get('/user/getTermsAndConditions', 'API\PagesController@getTermsAndConditions');

/* Address */
Route::get('/user/getAddress', 'API\User\UserController@getAddress');

Route::post('/sendMail', 'API\User\AuthController@sendMail');
