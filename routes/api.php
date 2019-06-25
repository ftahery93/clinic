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

Route::group(['middleware' => ['checkAuth', 'checkVersion']], function () {

    /* User Profile */
    Route::get('/user/getProfile', 'API\User\UserProfileController@getProfile');
    Route::put('/user/updateProfile', 'API\User\UserProfileController@updateProfile');
    Route::patch('/user/changeMobileNumber', 'API\User\UserProfileController@changeMobileNumber');
    Route::patch('/user/updateMobileNumber', 'API\User\UserProfileController@updateMobileNumber');

    /* User Address */
    Route::post('/user/addAddress', 'API\User\AddressController@addAddress');
    Route::get('/user/getAddressById/{address_id}', 'API\User\AddressController@getAddressById');
    Route::put('/user/editAddress', 'API\User\AddressController@editAddress');

    /* User shipments  */
    Route::post('/user/addShipment', 'API\User\ShipmentController@addShipment');
    Route::get('/user/getShipments', 'API\User\ShipmentController@getShipments');
    Route::get('/user/getShipmentDetails/{shipment_id}', 'API\User\ShipmentController@getShipmentDetails');
    Route::put('/user/editShipment', 'API\User\ShipmentController@editShipment');
    Route::get('/user/getCategories', 'API\User\ShipmentController@getCategories');
    Route::delete('/user/deleteShipmentById/{shipment_id}', 'API\User\ShipmentController@deleteShipmentById');

    Route::get('/company/getProfile', 'API\Company\CompanyProfileController@getProfile');
    Route::put('/company/updateProfile', 'API\Company\CompanyProfileController@updateProfile');
    Route::patch('/company/changeMobileNumber', 'API\Company\CompanyProfileController@changeMobileNumber');
    Route::patch('/company/updateMobileNumber', 'API\Company\CompanyProfileController@updateMobileNumber');

    /* Company Details */
    Route::get('/company/getCompanies', 'API\Company\CompanyProfileController@getCompanies');
    Route::get('/company/getCompanyDetails', 'API\Company\CompanyProfileController@getCompanyDetails');
    Route::get('/company/getCompanyDetailsById/{company_id}', 'API\Company\CompanyProfileController@getCompanyDetailsById');

    /* Company Shipments */
    Route::get('/company/getPendingShipments', 'API\Company\ShipmentController@getPendingShipments');
    Route::get('/company/getAcceptedShipments', 'API\Company\ShipmentController@getAcceptedShipments');
    Route::post('/company/acceptShipments', 'API\Company\ShipmentController@acceptShipment');
    Route::get('/company/getShipmentHistory', 'API\Company\ShipmentController@getShipmentHistory');
    Route::get('/company/getShipmentById/{shipment_id}', 'API\Company\ShipmentController@getShipmentById');
    Route::get('/company/markShipmentAsPicked/{shipment_id}', 'API\Company\ShipmentController@markShipmentAsPicked');
    Route::get('/company/markShipmentAsDelivered/{shipment_id}', 'API\Company\ShipmentController@markShipmentAsDelivered');

    /* Company Free deliveries */
    Route::get('/company/getFreeDeliveriesCount', 'API\Company\CompanyProfileController@getFreeDeliveriesCount');

    /* Company Wallet APIs */
    Route::post('/company/addToWallet', 'API\Company\WalletController@addToWallet');
    Route::post('/company/deductFromWallet', 'API\Company\WalletController@deductFromWallet');
    Route::get('/company/getWalletOffers', 'API\Company\WalletController@getWalletOffers');

    /* Additional APIs for development sake */
    Route::get('/user/getCompanies', 'API\User\ShipmentController@getCompanies');

    /* Ratings */
    Route::post('/user/rateCompany', 'API\User\RatingController@rateCompany');

});

Route::group(['middleware' => 'checkVersion'], function () {

    /* User */
    Route::post('/user/login', 'API\User\AuthController@login');
    Route::post('/user/register', 'API\User\AuthController@register');
    Route::get('/user/logout', 'API\User\AuthController@logout');
    Route::post('/user/verifyOTP', 'API\User\AuthController@verifyOTP');
    Route::post('/user/resendOTP', 'API\User\AuthController@resendOTP');

    /* Company Profile*/
    Route::post('/company/login', 'API\Company\CompanyEntryController@login');
    Route::post('/company/register', 'API\Company\CompanyEntryController@register');

    //Pages
    Route::get('/user/getTermsAndConditions', 'API\User\PagesController@getTermsAndConditions');

    /* Countries */
    Route::get('/user/getCountries', 'API\User\CountryController@getCountries');
});

Route::post('/sendMail', 'API\User\AuthController@sendMail');
