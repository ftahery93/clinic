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

Route::post('/users/login', 'API\ApplicationUsersController@login')->name('apiusersLogin'); 

// Register from Mobile device

Route::post('/users/register', 'API\ApplicationUsersController@register')->name('apiusersRegister'); 

// Forgot Password Link

Route::post('/users/forgot', 'API\ForgotPasswordController@sendResetLinkEmail')->name('apiusersForgot'); 

// Middleware auth:api 

Route::group(['middleware' => 'auth:api'], function(){

    // Logout from Mobile device

    Route::post('/users/logout', 'API\ApplicationUsersController@logout')->name('apiusersLogout');  

   // Profile from Mobile device

    Route::get('/users/profile', 'API\ApplicationUsersController@profile')->name('apiusersProfile'); 

    // Profile Edit from Mobile device

    Route::post('/users/profile/edit', 'API\ApplicationUsersController@edit')->name('apiusersProfileEdit'); 

    // Change Password for Account from Mobile device

    Route::post('/users/password', 'API\ApplicationUsersController@changePassword')->name('apiuserschangePassword'); 

    // Delete/Disable Account from Mobile device

    Route::delete('/users/delete', 'API\ApplicationUsersController@delete')->name('apiusersDelete'); 

    // List of Saved Polls 

    Route::get('/users/getfavourites', 'API\PollsController@getSavedPolls')->name('apipollsFavourites'); 

    // List of My Polls

    Route::get('/users/getmypolls', 'API\PollsController@getMyPolls')->name('apipollsMypolls');  

    // Mark Poll as Favourite

    Route::post('/users/markfavourite/{id}', 'API\PollsController@savePollById')->name('apipollsFavourite');  

    // Fetch List of Polls 

    Route::get('/getpolls', 'API\PollsController@getPolls')->name('apipollsIndex');  

    // Get Polls List based on Category ID

    Route::post('/categories/getpolls', 'API\PollsController@getPollsByCategory')->name('apipollsCategory');  

    // Create Poll

    Route::post('/polls/create', 'API\PollsController@createPoll')->name('apipollCreate');  
    
    // Delete Poll

    Route::delete('/polls/delete/{id}', 'API\PollsController@deletePoll')->name('apipollDelete');  

    // Add a comment

    Route::post('/polls/addcomment', 'API\PollsController@addComment')->name('apipollComment');  

    // Fetch comments List

    Route::post('/polls/getcomments/{id}', 'API\PollsController@getCommentsById')->name('apipollComments');  

    // Fetch List of Categories 

    Route::get('/getcategories', 'API\CategoryController@getCategories')->name('apicategoriesIndex');  

    // Save List of User interested Categories 

    Route::post('/users/categories/favourite', 'API\CategoryController@saveUserCategories')->name('apisaveUserCategories');  

    // Fetch List of Categories 

    Route::get('/getcountries', 'API\CountriesController@getCountries')->name('apiCountries');  

    // Fetch List of Settings 

    Route::get('/getconfig', 'API\SettingsController@getConfiguration')->name('apisettingsIndex');

    // Fetch List of Durations for Poll 

    Route::get('/getdurations', 'API\SettingsController@getDurations')->name('apidurationsSetting');  

    // Make a poll request and fetch the poll result in percentage.

    Route::post('/makepoll', 'API\PollsController@makePoll')->name('apipoll');  

    // Get poll results

    Route::get('/poll/results/{id}', 'API\PollsController@getPollResults')->name('apipollResults');  

    // Get page results

    Route::post('/pages', 'API\PagesController@getPage')->name('apiPages');  

});

