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

// Language Route
Route::post('/lang', array('Middleware' => 'LanguageSwitcher','uses' => 'LanguageController@index',))->name('lang');
// For Language direct URL link
Route::get('/lang/{lang}', array('Middleware' => 'LanguageSwitcher','uses' => 'LanguageController@change',))->name('langChange');
// .. End of Language Route

// Backend Routes
Auth::routes();

// default path after login
Route::get('/', function () {
    return redirect()->route('adminHome');
});

Route::Group(['prefix' => env('BACKEND_PATH')], function () {

    // No Permission
    Route::get('/403', function () { return view('errors.403'); })->name('NoPermission');

    // Not Found
    Route::get('/404', function () { return view('errors.404'); })->name('NotFound');

    // Admin Home
    Route::get('/dashboard', 'HomeController@index')->name('adminHome');

    // Registered Users
    Route::get('/regular/users', 'RegisteredUsersController@index')->name('registered_users_list');
    Route::post('/regular/users/updateAll', 'RegisteredUsersController@updateAll')->name('registered_users_update_all');

    // Company Users
    Route::get('/company/users/', 'CompanyUsersController@index')->name('company_users_list');
    Route::get('/company/user/edit/{id}', 'CompanyUsersController@edit')->name('company_users_edit');
    Route::post('/company/user/update/{id}', 'CompanyUsersController@update')->name('company_users_update');
    Route::post('/company/users/updateAll', 'CompanyUsersController@updateAll')->name('company_users_update_all');

    //API Company Reset Password
    Route::get('/password/resetApiUser/{token}', 'Auth\ResetApiUserPasswordController@showResetForm');
    Route::post('/password/resetApiUser', 'Auth\ResetApiUserPasswordController@reset');

    // Categories
    Route::get('/categories', 'CategoriesController@index')->name('categories_list');
    Route::get('/categories/create', 'CategoriesController@create')->name('categories_create');
    Route::post('/categories/store', 'CategoriesController@store')->name('categories_store');
    Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('categories_edit');
    Route::post('/categories/{id}/update', 'CategoriesController@update')->name('categories_update');
    Route::get('/categories/destroy/{id}', 'CategoriesController@destroy')->name('categories_destroy');
    Route::post('/categories/updateAll', 'CategoriesController@updateAll')->name('categories_update_all');

    // Shipments and Transactions
    Route::get('/users/shipments', 'ShipmentsController@index')->name('shipments_list');

    // Settings
    Route::get('/settings', 'SettingsController@edit')->name('settings');
    Route::post('/settings', 'SettingsController@updateSiteInfo')->name('site_settings_update');

    // Wallet Offers
    Route::get('/settings/wallet/offers', 'WalletOffersController@index')->name('wallet_offers_list');
    Route::get('/settings/wallet/offers/create', 'WalletOffersController@create')->name('wallet_offers_create');
    Route::get('/settings/wallet/offers/{id}/edit', 'WalletOffersController@edit')->name('wallet_offers_edit');
    Route::post('/settings/wallet/offers/store', 'WalletOffersController@store')->name('wallet_offers_store');
    Route::post('/settings/wallet/offers/{id}/update', 'WalletOffersController@update')->name('wallet_offers_update');
    Route::get('/settings/wallet/offers/destory/{id}', 'WalletOffersController@destroy')->name('wallet_offers_destroy');
    Route::post('/settings/wallet/offers/updateAll', 'WalletOffersController@updateAll')->name('wallet_offers_update_all');

    // Commission Setting
    Route::get('/settings/commission', 'SettingsController@showCommission')->name('commissions_setting');
    Route::post('/settings/commission/update', 'SettingsController@updateCommission')->name('commissions_update_setting');

    // Price Setting
    Route::get('/settings/price', 'SettingsController@showPrice')->name('price_setting');
    Route::post('/settings/price/update', 'SettingsController@updatePrice')->name('price_update_setting');

    // Notifications
    // Route::get('/notifications', 'NotificationsController@index')->name('notifications_list');
    // Route::get('/notifications/{id}/edit', 'NotificationsController@edit')->name('notifications_edit');
    // Route::get('/notifications/store', 'NotificationsController@index')->name('notifications_store');
    // Route::post('/notifications/{id}/update', 'NotificationsController@update')->name('notifications_update');
    // Route::get('/notifications/destroy/{id}', 'NotificationsController@destroy')->name('notifications_delete');
    // Route::post('/notifications/updateAll', 'NotificationsController@updateAll')->name('notifications_update_all');

    // Language Managment
    Route::get('/languages/{id}/edit', 'LanguageManagementController@edit')->name('adminLanguagesEdit');
    Route::post('/languages/{id}/update', 'LanguageManagementController@update')->name('adminLanguageUpdate');
    Route::get('/languages', 'LanguageManagementController@index')->name('adminLanguages');
    Route::get('/languages/{lang}/updateLocale', 'LanguageManagementController@updateLocale')->name('adminLanguageUpdateVariable');

    // Users & Permissions
    Route::get('/users', 'UsersController@index')->name('users_list');
    Route::get('/users/create/', 'UsersController@create')->name('users_create');
    Route::post('/users/store', 'UsersController@store')->name('users_store');
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('users_edit');
    Route::post('/users/{id}/update', 'UsersController@update')->name('users_update');
    Route::get('/users/destroy/{id}', 'UsersController@destroy')->name('users_delete');
    Route::post('/users/updateAll', 'UsersController@updateAll')->name('users_update_all');
    Route::get('/users/permissions/create/', 'UsersController@permissions_create')->name('permissions_create');
    Route::post('/users/permissions/store', 'UsersController@permissions_store')->name('permissions_store');
    Route::get('/users/permissions/{id}/edit', 'UsersController@permissions_edit')->name('permissions_edit');
    Route::post('/users/permissions/{id}/update', 'UsersController@permissions_update')->name('permissions_update');
    Route::get('/users/permissions/destroy/{id}', 'UsersController@permissions_destroy')->name('permissions_delete');

});
// .. End of Backend Routes