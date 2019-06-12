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

    Route::post('/users/profile/edit/{id}', 'API\ApplicationUsersController@edit')->name('apiusersProfileEdit'); 

    // Delete/Disable Account from Mobile devie

    Route::post('/users/delete/{id}', 'API\ApplicationUsersController@delete')->name('apiusersDelete'); 

    // Polls All List 

    Route::get('/polls', 'API\PollsController@index')->name('apipollsIndex');  

    // Polls List based on Language

    Route::post('/polls/{lang}', 'API\PollsController@getLanguagePolls')->name('apipollsIndexLang');  

    // Polls Create

    Route::post('/poll/create', 'API\PollsController@create')->name('apipollCreate');  
    
    // Polls Update

    Route::post('/poll/update/{id}', 'API\PollsController@update')->name('apipollUpdate');  

    // Polls Delete

    Route::post('/poll/delete/{id}', 'API\PollsController@delete')->name('apipollDelete');  

});

