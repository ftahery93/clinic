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

    //Search
    Route::get('/search', 'HomeController@search')->name('adminSearch');
    Route::post('/find', 'HomeController@find')->name('adminFind');

    // Registered Users
    Route::get('/regular/users', 'RegisteredUsersController@index')->name('registered_users_list');
    Route::post('/regular/users/updateAll', 'RegisteredUsersController@updateAll')->name('registered_users_update_all');

    // Company Users
    Route::get('/company/users/', 'CompanyUsersController@index')->name('company_users_list');
    Route::get('/company/users/commissions', 'CompanyUsersController@commissions')->name('commissions_list');
    Route::get('/company/user/edit/{id}', 'CompanyUsersController@edit')->name('company_users_edit');
    Route::post('/company/user/update/{id}', 'CompanyUsersController@update')->name('company_users_update');
    Route::post('/company/users/updateAll', 'CompanyUsersController@updateAll')->name('company_users_update_all');

    //API Company Reset Password
    Route::get('/password/resetApiUser/{token}', 'Auth\ResetApiUserPasswordController@showResetForm');
    Route::post('/password/resetApiUser', 'Auth\ResetApiUserPasswordController@reset');

    // Categories
    Route::get('/categories', 'CategoriesController@index')->name('categories_list');
    Route::get('/categories/create', 'CategoriesController@create')->name('adminCategoriesCreate');
    Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('adminCategoriesEdit');
    Route::get('/categories/destroy/{id}', 'CategoriesController@destroy')->name('adminCategoriesDestroy');
    Route::post('/categories/updateAll', 'CategoriesController@updateAll')->name('adminCategoriesUpdateAll');

    // Shipments and Transactions
    Route::get('/users/shipments', 'ShipmentsController@index')->name('shipments_list');

    // Settings
    Route::get('/settings', 'SettingsController@edit')->name('settings');
    Route::post('/settings', 'SettingsController@updateSiteInfo')->name('site_settings_update');

    // Wallet Offers
    Route::get('/settings/wallet/offers', 'WalletOffersController@index')->name('wallet_offers_list');
    Route::post('/settings/wallet/offers/{id}', 'WalletOffersController@edit')->name('wallet_offers_edit');
    Route::post('/settings/wallet/offers/destory/{id}', 'WalletOffersController@destroy')->name('wallet_offers_destroy');
    Route::post('/settings/wallet/offers/updateAll', 'WalletOffersController@updateAll')->name('wallet_offers_update_all');

    // Notifications
    Route::post('/notifications', 'NotificationsController@index')->name('notifications_list');
    Route::post('/notifications/search', 'NotificationsController@search')->name('webmailsSearch');
    Route::get('/notifications/{id}/edit', 'NotificationsController@edit')->name('webmailsEdit');
    Route::get('/notifications/{group_id?}/{wid?}/{stat?}/{contact_email?}', 'NotificationsController@index')->name('adminNotifications');
    Route::post('/notifications/{id}/update', 'NotificationsController@update')->name('webmailsUpdate');
    Route::get('/notifications/destroy/{id}', 'NotificationsController@destroy')->name('webmailsDestroy');
    Route::post('/notifications/updateAll', 'NotificationsController@updateAll')->name('webmailsUpdateAll');

    // Language Managment
    Route::get('/languages/{id}/edit', 'LanguageManagementController@edit')->name('adminLanguagesEdit');
    Route::post('/languages/{id}/update', 'LanguageManagementController@update')->name('adminLanguageUpdate');
    Route::get('/languages', 'LanguageManagementController@index')->name('adminLanguages');
    Route::get('/languages/{lang}/updateLocale', 'LanguageManagementController@updateLocale')->name('adminLanguageUpdateVariable');

    // Users & Permissions
    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/create/', 'UsersController@create')->name('usersCreate');
    Route::post('/users/store', 'UsersController@store')->name('usersStore');
    Route::get('/users/{id}/edit', 'UsersController@edit')->name('usersEdit');
    Route::post('/users/{id}/update', 'UsersController@update')->name('usersUpdate');
    Route::get('/users/destroy/{id}', 'UsersController@destroy')->name('usersDestroy');
    Route::post('/users/updateAll', 'UsersController@updateAll')->name('usersUpdateAll');
    Route::get('/users/permissions/create/', 'UsersController@permissions_create')->name('permissionsCreate');
    Route::post('/users/permissions/store', 'UsersController@permissions_store')->name('permissionsStore');
    Route::get('/users/permissions/{id}/edit', 'UsersController@permissions_edit')->name('permissionsEdit');
    Route::post('/users/permissions/{id}/update', 'UsersController@permissions_update')->name('permissionsUpdate');
    Route::get('/users/permissions/destroy/{id}', 'UsersController@permissions_destroy')->name('permissionsDestroy');

});
// .. End of Backend Routes