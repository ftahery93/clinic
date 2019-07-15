<?php

// Dashboard routes
Route::get('dashboard', 'Admin\DashboardController@index');

// Categories Quotation Form routes
Route::get('categories/dynamicForm', 'Admin\CategoryController@dynamicForm');
Route::get('categories/quotationForm', 'Admin\CategoryController@quotationForm');
Route::get('categories/{id}/requestQuotation', 'Admin\CategoryController@requestQuotation');
Route::get('categories/quotationFormPreview/{id}', 'Admin\CategoryController@quotationFormPreview');
Route::post('categories/storeRequestQuotation', 'Admin\CategoryController@storeRequestQuotation');

// Categories Apply Quotation Form routes
Route::get('categories/dynamicQuotationForm', 'Admin\CategoryController@dynamicForm');
Route::get('categories/applyQuotationForm', 'Admin\CategoryController@applyQuotationForm');
Route::get('categories/{id}/quotation', 'Admin\CategoryController@quotation');
Route::get('categories/applyQuotationFormPreview/{id}', 'Admin\CategoryController@applyQuotationFormPreview');
Route::post('categories/storeQuotation', 'Admin\CategoryController@storeQuotation');

// Categories routes
Route::post('masters/categories/delete', 'Admin\CategoryController@destroyMany');
Route::resource('categories', 'Admin\CategoryController');

// User Quotation Request routes
Route::get('quotationRequestedList/{user_id}', 'Admin\QuotationRequestedController@index');
Route::get('quotationRequestedDetails/{id}', 'Admin\QuotationRequestedController@quotationRequestedDetails');
Route::get('quotationAppliedDetails/{id}', 'Admin\QuotationRequestedController@quotationAppliedDetails');
Route::get('docDownload/{file}/{filePath}', 'Admin\QuotationRequestedController@docDownload');
Route::get('userQuotationRequestedList/{id}', 'Admin\QuotationRequestedController@userQuotationRequestedList');
Route::get('requestedList/{id}/{user_id}', 'Admin\QuotationRequestedController@requestedList');
Route::get('userQuotationDetails/{id}/{quotation_id}', 'Admin\QuotationRequestedController@userQuotationDetails');

// Banner Images routes
Route::get('bannerImages/uploadImages', 'Admin\BannerImageController@uploadImages');
Route::post('bannerImages/images', 'Admin\BannerImageController@images');
Route::post('bannerImages/deleteImage/{id}', 'Admin\BannerImageController@deleteImage');

// Country routes
Route::resource('countries', 'Admin\CountryController');
Route::post('masters/countries/delete', 'Admin\CountryController@destroyMany');

// User routes
Route::resource('users', 'Admin\UserController');
Route::post('users/delete', 'Admin\UserController@destroyMany');

// User Profile
Route::get('user/profile', 'Admin\UserProfileController@profile');
Route::put('user/profile', 'Admin\UserProfileController@update');

// Change Password
Route::get('user/changepassword', 'Admin\ChangePasswordController@index');
Route::put('user/changepassword', 'Admin\ChangePasswordController@update');

// Permisson routes
Route::resource('permissions', 'Admin\PermissionController');
Route::post('permissions/delete', 'Admin\PermissionController@destroyMany');

// Package routes
Route::resource('packages', 'Admin\PackageController');
Route::post('packages/delete', 'Admin\PackageController@destroyMany');

// RegisteredUser routes
Route::post('registeredUsers/delete', 'Admin\RegisteredUserController@trashMany');
Route::get('registeredUsers/trashedlist', 'Admin\RegisteredUserController@trashedlist');
Route::post('registeredUsers/trashed/{id}/delete', 'Admin\RegisteredUserController@destroy');
Route::post('registeredUsers/trashed/{id}/restore', 'Admin\RegisteredUserController@restore');
Route::resource('registeredUsers', 'Admin\RegisteredUserController');

// Service Provider routes
Route::post('serviceProviders/delete', 'Admin\ServiceProviderController@trashMany');
Route::get('serviceProviders/trashedlist', 'Admin\ServiceProviderController@trashedlist');
Route::post('serviceProviders/trashed/{id}/delete', 'Admin\ServiceProviderController@destroy');
Route::post('serviceProviders/trashed/{id}/restore', 'Admin\ServiceProviderController@restore');
Route::get('serviceProviders/{user_id}/uploadImages', 'Admin\ServiceProviderController@uploadImages');
Route::post('serviceProviders/{user_id}/images', 'Admin\ServiceProviderController@images');
Route::post('serviceProviders/deleteImage/{id}', 'Admin\ServiceProviderController@deleteImage');

// Service Provider Servces routes
Route::get('serviceProviders/{serviceProvider_id}/services', 'Admin\ServiceProviderController@service');
Route::post('serviceProviders/{serviceProvider_id}/addService', 'Admin\ServiceProviderController@addService');
Route::post('serviceProviders/{serviceProvider_id}/service/delete', 'Admin\ServiceProviderController@destroyService');
Route::get('serviceProviders/{id}/serviceViewed', 'Admin\ServiceProviderController@serviceViewed');
Route::get('serviceProviders/requirements', 'Admin\ServiceProviderController@requirement');
Route::get('serviceProviders/{id}/requirementViewed', 'Admin\ServiceProviderController@requirementViewed');
Route::get('serviceProviders/{id}/requirements', 'Admin\ServiceProviderController@requirement');

// Service Provider Quotation Form routes
Route::get('serviceProviders/dynamicForm/{id}', 'Admin\ServiceProviderController@dynamicForm');
Route::get('serviceProviders/quotationForm', 'Admin\ServiceProviderController@quotationForm');
Route::get('serviceProviders/{id}/requestQuotation', 'Admin\ServiceProviderController@requestQuotation');
Route::get('serviceProviders/quotationFormPreview/{id}', 'Admin\ServiceProviderController@quotationFormPreview');
Route::post('serviceProviders/storeRequestQuotation', 'Admin\ServiceProviderController@storeRequestQuotation');
Route::resource('serviceProviders', 'Admin\ServiceProviderController');

// CMSPages routes
Route::resource('cmsPages', 'Admin\CmsPageController');
Route::post('cmsPages/delete', 'Admin\CmsPageController@destroyMany');

// InformationPages routes
Route::resource('information', 'Admin\InformationController');
Route::post('information/delete', 'Admin\InformationController@destroyMany');

// Faq routes
Route::resource('faq', 'Admin\FaqController');
Route::post('faq/delete', 'Admin\FaqController@destroyMany');

// Contactus routes
Route::get('contactus', 'Admin\ContactusController@index');

// Notifications routes
Route::resource('notifications', 'Admin\NotificationController');
Route::post('notifications/delete', 'Admin\NotificationController@destroyMany');

// Authentication Routes
Route::get('', 'Admin\Auth\LoginController@index');
Route::post('login', 'Admin\Auth\LoginController@login');
Route::get('logout', 'Admin\Auth\LoginController@logout');

// Password Reset Routes
Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset');

// Backup routes
Route::get('backup', 'Admin\BackupController@index');
Route::get('backup/create', 'Admin\BackupController@create');
Route::get('backup/download/{file_name}', 'Admin\BackupController@download');
Route::post('backup/{file_name}/delete', 'Admin\BackupController@delete');

// LogActivity routes
Route::get('logActivity', 'Admin\LogActivityController@index');
Route::get('vendorLogActivity', 'Admin\LogActivityController@vendorLog');
Route::get('trainerLogActivity', 'Admin\LogActivityController@trainerLog');

// languageManagement routes
Route::resource('languageManagement', 'Admin\LanguageManagementController');
Route::post('languageManagement/delete', 'Admin\LanguageManagementController@destroyMany');
Route::get('languageManagement/updateLocale/{lang}', 'Admin\LanguageManagementController@updateLocale');

// Category Servces routes
Route::get('services/{category_id}', 'Admin\ServiceController@index');
Route::get('services/create/{category_id}', 'Admin\ServiceController@create');
Route::post('services/{category_id}', 'Admin\ServiceController@store');
Route::get('services/{id}/edit/{category_id}/', 'Admin\ServiceController@edit');
Route::patch('services/{id}/{category_id}', 'Admin\ServiceController@update');
Route::post('services/delete/{category_id}', 'Admin\ServiceController@destroyMany');

Route::get('payment/checkPaymentStatus/{id}/{payID}', 'Admin\PaymentTest@checkPaymentStatus');

//Cache Config , Route , View, Optimize
Route::get('configCache', 'Admin\CacheController@configCache');
Route::get('routeCache', 'Admin\CacheController@routeCache');
Route::get('viewCache', 'Admin\CacheController@viewCache');
Route::get('optimize', 'Admin\CacheController@optimize');

//Cache Clear Config , Route , View, Optimize
Route::get('configCacheClear', 'Admin\CacheController@configCacheClear');
Route::get('routeCacheClear', 'Admin\CacheController@routeCacheClear');
Route::get('viewCacheClear', 'Admin\CacheController@viewCacheClear');
Route::get('cacheClear', 'Admin\CacheController@cacheClear');

Route::get('payment/{order_id?}', 'API\Company\PaymentController@payment');

// Route::get('/updateapp', function()
// {
//     exec('composer dump-autoload');
//     echo 'composer dump-autoload complete';
// });

// //Errors
// Route::get('errors/401', function () {
//     return view('errors.401');
// });
// Route::get('errors/505', function () {
//     return view('errors.505');
// });
