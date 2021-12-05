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
    Route::get('/dashboard/form/{name}', 'Front\FrontendController@addContentForm')->name('user-dashboard-form');
    Route::post('/playlist', 'User\UserController@createPlaylist')->name('create-playlist');
    Route::post('/playlist/delete', 'User\UserController@deletePlaylist')->name('delete-playlist');
    Route::post('/playlist/add/media', 'User\UserController@addMediaToPlaylist')->name('add-to-playlist');
    Route::post('/playlist/remove/media', 'User\UserController@removeMediaFromPlaylist')->name('remove-from-playlist');
    Route::post('/like', 'User\UserController@like')->name('media-like');
    Route::get('/likes', 'Front\FrontendController@getLikes')->name('get-likes');
    Route::get('/list/playlists/add/{media_id}', 'User\UserController@addToPlaylistList')->name('get-add-to-playlist');
    Route::get('/playlist/{id}', 'Front\FrontendController@getPlaylist')->name('get-playlist');
    Route::post('/post/comment', 'User\UserController@postComment')->name('post-comment');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkrole']], function () {
    Route::get('/edit/{id}', 'Admin\AdminController@editMediaView')->name('media-edit');
    Route::post('/edit', 'Admin\AdminController@editMedia')->name('media-edit-form');
    Route::post('/create', 'Admin\AdminController@createMedia')->name('media-create');
    Route::post('/delete', 'Admin\AdminController@deleteMedia')->name('media-delete');
    Route::get('/manage/comments/{status}', 'Admin\AdminController@manageComments')->name('manage-comments');
    Route::post('/delete/comment', 'Admin\AdminController@deleteComment')->name('delete-comment');
    Route::post('/validate/comment', 'Admin\AdminController@validateComment')->name('validate-comment');
});

Route::middleware(['setlang'])->group(function () {
    Route::get('/media/{id}', 'Front\FrontendController@getMedia')->name('get-media');
    Route::get('/', function () {return redirect('/home');});
    Route::post('/search', 'Front\FrontendController@searchMedia')->name('search-media');
    Route::get('/{content}/{tag?}', 'Front\FrontendController@index')->name('front.index');
});