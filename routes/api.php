<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Login from Mobile device
Route::post('/users/login', 'API\ApplicationUsersController@login')->name('api_login'); 

// Register from Mobile device
Route::post('/users/register', 'API\ApplicationUsersController@register')->name('api_register'); 

// Forgot Password Send Link to Email
Route::post('/users/forgot', 'API\ForgotPasswordController@sendResetLinkEmail')->name('api_forgot'); 

// Middleware auth:api 
Route::group(['middleware' => 'auth:api'], function(){

    // Logout from Mobile device
    Route::post('/users/logout', 'API\ApplicationUsersController@logout')->name('api_logout');  

   // Profile from Mobile device
    Route::get('/users/profile', 'API\ApplicationUsersController@profile')->name('api_user_profile'); 

    // Profile Edit from Mobile device
    Route::post('/users/profile/edit', 'API\ApplicationUsersController@edit')->name('api_user_profile_edit'); 

    // Change Password for Account from Mobile device
    Route::post('/users/password', 'API\ApplicationUsersController@changePassword')->name('api_user_change_password'); 

    // List of Saved Polls 
    Route::get('/users/getfavourites', 'API\PollsController@getSavedPolls')->name('api_saved_polls'); 

    // List of My Polls
    Route::get('/users/getmypolls', 'API\PollsController@getMyPolls')->name('api_my_polls');  

    // Mark Poll as Favourite
    Route::post('/users/markfavourite/{id}', 'API\PollsController@savePollById')->name('api_save_poll');  

    // Fetch List of Polls 
    Route::get('/getpolls', 'API\PollsController@getPolls')->name('api_polls');  

    // Get Polls List based on Category ID
    Route::post('/categories/getpolls', 'API\PollsController@getPollsByCategory')->name('api_category_polls');  

    // Create Poll
    Route::post('/polls/create', 'API\PollsController@createPoll')->name('api_create_poll');  
    
    // Delete Poll
    Route::delete('/polls/delete/{id}', 'API\PollsController@deletePoll')->name('api_delete_poll');  

    // Add a comment
    Route::post('/polls/addcomment', 'API\PollsController@addComment')->name('api_add_comment');  

    // Fetch comments List
    Route::post('/polls/getcomments/{id}', 'API\PollsController@getCommentsById')->name('api_poll_comments');  

    // Fetch List of Categories 
    Route::get('/getcategories', 'API\CategoryController@getCategories')->name('api_categories');  

    // Save List of User interested Categories 
    Route::post('/users/categories/save', 'API\CategoryController@saveUserCategories')->name('aoi_saved_categories');  

    // Delete Selected Category from Profile
    Route::post('/users/categories/delete', 'API\CategoryController@deleteUserCategory')->name('api_delete_category');  

    // Get List of User interested Categories 
    Route::get('/users/categories/favourites', 'API\CategoryController@getUserCategories')->name('api_user_categories');  

    // Fetch List of Categories 
    Route::get('/getcountries', 'API\CountriesController@getCountries')->name('api_countries');  

    // Fetch List of Trends Categories 
    Route::get('/getcountries/trends', 'API\CountriesController@getTrendCountries')->name('api_trend_countries');  

    // Fetch List of Settings 
    Route::get('/getconfig', 'API\SettingsController@getConfiguration')->name('api_configuration');

    // Fetch List of Durations for Poll 
    Route::get('/getdurations', 'API\SettingsController@getDurations')->name('api_poll_duration');  

    // Make a poll request and fetch the poll result in percentage.
    Route::post('/makepoll', 'API\PollsController@makePoll')->name('api_make_poll');  

    // Get poll results
    Route::get('/poll/results/{id}', 'API\PollsController@getPollResults')->name('api_poll_results');  

    // Get page results
    Route::post('/pages', 'API\PagesController@getPage')->name('api_pages'); 

    // Get notifications
    Route::get('/users/notifications', 'API\NotificationsController@getNotifications')->name('api_notifications');  

    // Read notifications
    Route::post('/users/notification/read', 'API\NotificationsController@read')->name('api_read_notification');  

});

