<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['setlang'])->group(function () {
    Route::get('/', 'Front\FrontendController@index')->name('front.index');
});

Route::get('/changelanguage/{lang}/{type?}', 'Front\FrontendController@changeLanguage')->name('changeLanguage');

/*=======================================================
******************** User Routes **********************
=======================================================*/


Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/login', 'User\LoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
    Route::get('/register', 'User\RegisterController@registerPage')->name('user-register');


    Route::get('/login/facebook', 'User\LoginController@redirectToFacebook')->name('front.facebook.login');
    Route::get('/login/facebook/callback', 'User\LoginController@handleFacebookCallback')->name('front.facebook.callback');

    Route::get('/login/google', 'User\LoginController@redirectToGoogle')->name('front.google.login');
    Route::get('/login/google/callback', 'User\LoginController@handleGoogleCallback')->name('front.google.callback');

    Route::post('/register/submit', 'User\RegisterController@register')->name('user-register-submit');
    Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
    Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user-forgot');
    Route::post('/forgot', 'User\ForgotController@forgot')->name('user-forgot-submit');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'userstatus']], function () {
    Route::get('/dashboard', 'User\UserController@index')->name('user-dashboard');
    Route::post('/profile', 'User\UserController@profileUpdate')->name('user-profile-update');
    Route::post('/reset', 'User\UserController@reset')->name('user-reset-submit');
    Route::get('/logout', 'User\LoginController@logout')->name('user-logout');
});
