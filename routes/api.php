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

// Login from Mobile devie

Route::post('/users/login', 'API\ApplicationUsersController@login')->name('apiusersLogin'); 

// Register from Mobile devie

Route::post('/users/register', 'API\ApplicationUsersController@register')->name('apiusersRegister'); 

// Forgot Password 

Route::post('/users/forgot', 'API\ApplicationUsersController@forgot')->name('apiusersForgotPassword'); 

// Middleware auth:api 

Route::group(['middleware' => 'auth:api'], function(){

    // Logout from Mobile device

    Route::post('/users/logout', 'API\ApplicationUsersController@logout')->name('apiusersLogout');  

   // Profile from Mobile devie

    Route::get('/users/profile', 'API\ApplicationUsersController@profile')->name('apiusersProfile'); 

    // Profile Edit from Mobile devie

    Route::post('/users/profile/edit', 'API\ApplicationUsersController@edit')->name('apiusersProfileEdit'); 

    // Change Password for Account from Mobile devie

    Route::post('/users/password', 'API\ApplicationUsersController@changePassword')->name('apiuserschangePassword'); 

    // Delete/Disable Account from Mobile devie

    Route::post('/users/delete', 'API\ApplicationUsersController@delete')->name('apiusersDelete'); 

    // Saved Polls All List 

    Route::get('/users/favourites', 'API\PollsController@favourites')->name('apipollsFavourites'); 

    // My Polls All List 

    Route::get('/users/mypolls', 'API\PollsController@mypolls')->name('apipollsMypolls');  

    // Mark Poll as Favourite All List 

    Route::post('/users/favourite/{id}', 'API\PollsController@favourite')->name('apipollsFavourite');  

    // Polls All List 

    Route::get('/polls', 'API\PollsController@index')->name('apipollsIndex');  

    // Polls List based on Category ID

    Route::post('/polls', 'API\PollsController@index')->name('apipollsCategory');  

    // Polls Create

    Route::post('/poll/create', 'API\PollsController@create')->name('apipollCreate');  
    
    // Polls Update

    Route::post('/poll/update/{id}', 'API\PollsController@update')->name('apipollUpdate');  

    // Polls Delete

    Route::post('/poll/delete/{id}', 'API\PollsController@delete')->name('apipollDelete');  

});

