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
    Route::put('/user/updateMobileNumber', 'API\User\UserProfileController@updateMobileNumber');
    Route::post('/user/logout', 'API\User\UserProfileController@logout');

    /* User Address */
    Route::post('/user/addAddress', 'API\User\AddressController@addAddress');
    Route::get('/user/getAddressById/{address_id}', 'API\User\AddressController@getAddressById');
    Route::get('/user/getAddresses', 'API\User\AddressController@getAddresses');
    Route::put('/user/editAddress', 'API\User\AddressController@editAddress');
    Route::delete('/user/deleteAddressById/{address_id}', 'API\User\AddressController@deleteAddressById');
    Route::get('/user/getGovernoratesByCountry/{country_id}', 'API\User\AddressController@getGovernoratesByCountry');
    Route::get('/user/getCitiesByGovernorate/{governorate_id}', 'API\User\AddressController@getCitiesByGovernorate');
    Route::get('/user/getAddressById/{address_id}', 'API\User\AddressController@getAddressById');
    Route::get('/user/getGovernorateByCity/{city_id}', 'API\User\AddressController@getGovernorateByCity');

    /* User shipments  */
    Route::post('/user/addShipment', 'API\User\ShipmentController@addShipment');
    Route::get('/user/getShipments', 'API\User\ShipmentController@getShipments');
    Route::get('/user/getShipmentDetails/{shipment_id}', 'API\User\ShipmentController@getShipmentDetails');
    Route::put('/user/editShipment', 'API\User\ShipmentController@editShipment');
    Route::get('/user/getCategories', 'API\User\ShipmentController@getCategories');
    Route::delete('/user/deleteShipmentById/{shipment_id}', 'API\User\ShipmentController@deleteShipmentById');

    Route::get('/user/getShipmentHistory', 'API\User\ShipmentController@getShipmentHistory');

    /* Price API */
    Route::post('/user/getShipmentPrice', 'API\User\PriceController@getShipmentPrice');

    /* Additional APIs for development sake */
    Route::get('/user/getCompanies', 'API\User\CompanyController@getCompanies');
    Route::get('/user/getCompanyDetailsById/{company_id}', 'API\User\CompanyController@getCompanyDetailsById');

    /* Ratings */
    Route::post('/user/rateCompany', 'API\User\RatingController@rateCompany');
    Route::get('/user/getMyRatingByCompanyId/{company_id}', 'API\User\RatingController@getMyRatingByCompanyId');

});

Route::group(['middleware' => ['checkAuth', 'checkCompanyVersion']], function () {

    Route::get('/company/getProfile', 'API\Company\CompanyProfileController@getProfile');
    Route::put('/company/updateProfile', 'API\Company\CompanyProfileController@updateProfile');
    Route::patch('/company/changeMobileNumber', 'API\Company\CompanyProfileController@changeMobileNumber');
    Route::patch('/company/updateMobileNumber', 'API\Company\CompanyProfileController@updateMobileNumber');

    Route::post('/company/logout', 'API\Company\CompanyProfileController@logout');

    /* Company Details */
    Route::get('/company/getCompanies', 'API\Company\CompanyProfileController@getCompanies');
    Route::get('/company/getCompanyDetails', 'API\Company\CompanyProfileController@getCompanyDetails');
    Route::get('/company/getCompanyDetailsById/{company_id}', 'API\Company\CompanyProfileController@getCompanyDetailsById');

    /* Company Shipments */
    Route::get('/company/getPendingShipments/{from_id?}/{to_id?}', 'API\Company\ShipmentController@getPendingShipments');
    Route::get('/company/getMyShipments', 'API\Company\ShipmentController@getMyShipments');
    Route::post('/company/payShipments', 'API\Company\ShipmentController@payShipments');
    Route::post('/company/reserveShipments', 'API\Company\ShipmentController@reserveShipments');

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
    Route::get('/company/getWalletDetails', 'API\Company\WalletController@getWalletDetails');

    Route::get('/company/payOrder/{order_id}', 'API\Company\PaymentController@payOrder');
    Route::post('/company/addToWallet', 'API\Company\PaymentController@addToWallet');

    Route::get('/company/getMyCities', 'API\Company\ShipmentController@getMyCities');
});

Route::group(['middleware' => 'checkCompanyVersion'], function () {

    /* Company Profile*/
    Route::post('/company/login', 'API\Company\CompanyEntryController@login');
    Route::post('/company/register', 'API\Company\CompanyEntryController@register');
    Route::get('/company/getCountries', 'API\Company\CountryController@getCountries');
});

Route::group(['middleware' => 'checkVersion'], function () {

    Route::get('/user/getAllCities', 'API\User\AddressController@getAllCities');

    /* User */
    Route::post('/user/login', 'API\User\AuthController@login');
    Route::post('/user/register', 'API\User\AuthController@register');

    Route::post('/company/forgotPassword', 'API\Company\ForgotPasswordController@sendResetLinkEmail');

    //Pages
    Route::get('/user/getTermsAndConditions', 'API\User\PagesController@getTermsAndConditions');

    Route::get('/company/getTermsAndConditions', 'API\Company\PageController@getTermsAndConditions');

    /* Countries */
    Route::get('/user/getCountries', 'API\User\CountryController@getCountries');

});

Route::post('/sendMail', 'API\User\AuthController@sendMail');
