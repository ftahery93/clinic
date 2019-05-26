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

Route::post('/user/addAddress', 'API\User\AddressController@addAddress');
Route::get('/user/getAddress/{id}', 'API\User\AddressController@getAddress');

/* User shipments  */
Route::post('/user/addShipment', 'API\User\ShipmentController@addShipment');

/* Company */
Route::post('/company/login', 'API\Company\CompanyEntryController@login');
Route::post('/company/register', 'API\Company\CompanyEntryController@register');
Route::get('/company/getProfile', 'API\Company\CompanyProfileController@getProfile');
Route::get('/company/getCompanyDetails', 'API\Company\CompanyProfileController@getCompanyDetails');
Route::get('/company/getCompanyDetailsById/{id}', 'API\Company\CompanyProfileController@getCompanyDetailsById');
Route::get('/company/getPendingShipments', 'API\Company\ShipmentController@getPendingShipments');
Route::get('/company/getMyShipments', 'API\Company\ShipmentController@getMyShipments');
Route::get('/company/acceptShipment/{shipment_id}', 'API\Company\ShipmentController@acceptShipment');
Route::get('/company/getShipmentHistory', 'API\Company\ShipmentController@getShipmentHistory');
Route::get('/company/shipmentPickedUp/{shipment_id}', 'API\Company\ShipmentController@shipmentPickedUp');
Route::get('/company/shipmentDelivered/{shipment_id}', 'API\Company\ShipmentController@shipmentDelivered');

//Profile
Route::get('/user/profile', 'API\User\UserProfileController@profile');
Route::post('/user/profile/update', 'API\User\UserProfileController@update');

//Pages
Route::get('/user/getTermsAndConditions', 'API\User\PagesController@getTermsAndConditions');

/* Address */
Route::get('/user/getAddress', 'API\User\UserController@getAddress');

/* Wallet APIs */
Route::post('/company/addToWallet', 'API\Company\WalletController@addToWallet');
Route::post('/company/deductFromWallet', 'API\Company\WalletController@deductFromWallet');
Route::get('/company/getWalletOffers', 'API\Company\WalletController@getWalletOffers');

Route::post('/sendMail', 'API\User\AuthController@sendMail');
