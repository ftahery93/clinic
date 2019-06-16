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

    // List of Saved Polls 

    Route::get('/users/favourites', 'API\PollsController@favourites')->name('apipollsFavourites'); 

    // List of My Polls

    Route::get('/users/mypolls', 'API\PollsController@mypolls')->name('apipollsMypolls');  

    // Mark Poll as Favourite

    Route::post('/users/favourite/{id}', 'API\PollsController@favourite')->name('apipollsFavourite');  

    // Fetch List of Polls 

    Route::get('/polls', 'API\PollsController@index')->name('apipollsIndex');  

    // Get Polls List based on Category ID

    Route::post('/polls', 'API\PollsController@index')->name('apipollsCategory');  

    // Create Poll

    Route::post('/polls/create', 'API\PollsController@create')->name('apipollCreate');  
    
    // Delete Poll

    Route::post('/polls/delete/{id}', 'API\PollsController@delete')->name('apipollDelete');  

    // Add a comment

    Route::post('/polls/comment', 'API\PollsController@comment')->name('apipollComment');  

    // Fetch comments List

    Route::post('/polls/comments/{id}', 'API\PollsController@comments')->name('apipollComments');  

});

