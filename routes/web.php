<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\XSS;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['XSS', 'guest']], function() {

        /**
         * Register Routes
        */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
        */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform')->middleware('throttle:custom_limit');

    });

    Route::group(['middleware' => ['auth']], function() {

        /**
         * Logout Routes
        */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::get('/profile', 'ProfileController@show')->name('profile.show');
        Route::post('/profile/{user}', 'ProfileController@update')->name('profile.update');

        
        
        Route::get('/request-reset-password', 'ResetpasswordController@requestResetPassword');
        Route::post('/profile/{user}', 'ProfileController@update')->name('profile.update');
        
    });

    Route::get('/forget-password', 'ResetpasswordController@forgetPassword');
    Route::post('/forget-password', 'ResetpasswordController@forgetPasswordSendLink');
    Route::get('reset-password/{token}',  'ResetpasswordController@showResetPasswordForm');
    Route::post('reset-password', 'ResetpasswordController@submitResetPasswordForm');

});
