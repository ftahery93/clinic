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
    Route::get('/regular/user/destroy/{id}', 'RegisteredUsersController@destroy')->name('registered_users_delete');
    Route::post('/regular/users/updateAll', 'RegisteredUsersController@updateAll')->name('registered_users_update_all');

    // Company Users
    Route::get('/company/users/', 'CompanyUsersController@index')->name('company_users_list');
    Route::get('/company/user/destroy/{id}', 'CompanyUsersController@destroy')->name('company_users_delete');
    Route::post('/company/users/updateAll', 'CompanyUsersController@updateAll')->name('company_users_update_all');

    // Categories
    Route::get('/categories', 'CategoriesController@index')->name('adminCategories');
    Route::get('/categories/create', 'CategoriesController@create')->name('adminCategoriesCreate');
    Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('adminCategoriesEdit');
    Route::get('/categories/destroy/{id}', 'CategoriesController@destroy')->name('adminCategoriesDestroy');
    Route::post('/categories/updateAll', 'CategoriesController@updateAll')->name('adminCategoriesUpdateAll');

    // Settings
    Route::get('/settings', 'SettingsController@edit')->name('settings');
    Route::post('/settings', 'SettingsController@updateSiteInfo')->name('settingsUpdateSiteInfo');
    Route::post('/settings/status', 'SettingsController@updateSiteStatus')->name('settingsUpdateSiteStatus');
    Route::post('/settings/wallet/offers', 'SettingsController@walletOffers')->name('wallet_offers_setting');

    // Notifications
    Route::post('/notifications/store', 'NotificationsController@store')->name('webmailsStore');
    Route::post('/notifications/search', 'NotificationsController@search')->name('webmailsSearch');
    Route::get('/notifications/{id}/edit', 'NotificationsController@edit')->name('webmailsEdit');
    Route::get('/notifications/{group_id?}/{wid?}/{stat?}/{contact_email?}', 'NotificationsController@index')->name('adminNotifications');
    Route::post('/notifications/{id}/update', 'NotificationsController@update')->name('webmailsUpdate');
    Route::get('/notifications/destroy/{id}', 'NotificationsController@destroy')->name('webmailsDestroy');
    Route::post('/notifications/updateAll', 'NotificationsController@updateAll')->name('webmailsUpdateAll');

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

    // Languages & Management
    Route::get('/languages', 'LanguageController@getList')->name('languages');
    Route::post('/languages/show', 'LanguageController@showLanguages')->name('adminLangIndex');
    Route::post('/languages/edit', 'LanguageController@edit')->name('adminLanguagesEdit');
});
// .. End of Backend Routes