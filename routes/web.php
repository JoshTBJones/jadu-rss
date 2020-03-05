<?php

/**************************************************************************//**
 * Log In Routes
 *
 * The routes contained within this login group prefix relate to the users
 * login process. Be it entering their credentials, their one time password or
 * going through the 'forgotten password' process.
 */
Route::prefix('login')->group( function() {
    Route::get('/', function () {
        return view('auth.login');
    });

    Route::post('/authenticate', 'UserController@authenticate');

    Route::get('/out', 'UserController@logout');
});

Route::middleware('check.session')->group(function () {
    Route::get('/', function () {
        return view('rss.index');
    });
    
    Route::prefix('feeds')->group( function() {
        Route::get('/', function () {
            return view('rss.index');
        });
    
        Route::get('/new', function () {
            return view('rss.new');
        });

        Route::get('/{id}/view', 'FeedController@view');

        // Delete View
        Route::get('/{id}/destroy', 'FeedController@destroy');
    
        // Create
        Route::post('/', 'FeedController@store');
        // Get
        Route::get('/{id}', 'FeedController@show');
        // Update
        Route::patch('/{id}', 'FeedController@update');
        // Delete
        Route::delete('{id}', 'FeedController@destroy');
    
    
    });
});
