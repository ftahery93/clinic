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

/* User Profile */
Route::get('/user/getProfile', 'API\User\UserProfileController@getProfile');
Route::put('/user/updateProfile', 'API\User\UserProfileController@updateProfile');

/* User Address */
Route::post('/user/addAddress', 'API\User\AddressController@addAddress');
Route::get('/user/getAddress/{address_id}', 'API\User\AddressController@getAddress');

/* User shipments  */
Route::post('/user/addShipment', 'API\User\ShipmentController@addShipment');
Route::get('/user/getShipments', 'API\User\ShipmentController@getShipments');
Route::get('/user/getShipmentDetails/{shipment_id}', 'API\User\ShipmentController@getShipmentDetails');

/* Company Profile*/
Route::post('/company/login', 'API\Company\CompanyEntryController@login');
Route::post('/company/register', 'API\Company\CompanyEntryController@register');
Route::get('/company/getProfile', 'API\Company\CompanyProfileController@getProfile');
Route::put('/company/updateProfile', 'API\Company\CompanyProfileController@updateProfile');
Route::post('/company/changeMobileNumber', 'API\Company\CompanyProfileController@changeMobileNumber');
Route::put('/company/updateMobileNumber', 'API\Company\CompanyProfileController@updateMobileNumber');

/* Company Details */
Route::get('/company/getCompanyDetails', 'API\Company\CompanyProfileController@getCompanyDetails');
Route::get('/company/getCompanyDetailsById/{company_id}', 'API\Company\CompanyProfileController@getCompanyDetailsById');

/* Company Shipments */
Route::get('/company/getPendingShipments', 'API\Company\ShipmentController@getPendingShipments');
Route::get('/company/getAcceptedShipments', 'API\Company\ShipmentController@getAcceptedShipments');
Route::post('/company/acceptShipments', 'API\Company\ShipmentController@acceptShipment');
Route::get('/company/getShipmentHistory', 'API\Company\ShipmentController@getShipmentHistory');
Route::get('/company/getShipmentById/{shipment_id}', 'API\Company\ShipmentController@getShipmentById');
Route::get('/company/pickedUpShipmentById/{shipment_id}', 'API\Company\ShipmentController@pickedUpShipmentById');
Route::get('/company/deliveredShipmentById/{shipment_id}', 'API\Company\ShipmentController@deliveredShipmentById');

/* Company Free deliveries */
Route::get('/company/getFreeDeliveriesCount', 'API\Company\CompanyProfileController@getFreeDeliveriesCount');

/* Company Wallet APIs */
Route::post('/company/addToWallet', 'API\Company\WalletController@addToWallet');
Route::post('/company/deductFromWallet', 'API\Company\WalletController@deductFromWallet');
Route::get('/company/getWalletOffers', 'API\Company\WalletController@getWalletOffers');

//Pages
Route::get('/user/getTermsAndConditions', 'API\User\PagesController@getTermsAndConditions');

/* Countries */
Route::get('/user/getCountries', 'API\User\CountryController@getCountries');

Route::post('/sendMail', 'API\User\AuthController@sendMail');
