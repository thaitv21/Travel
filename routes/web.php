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
Route::get('/', 'HomeController@index')->name('home');

Route::get('sign-up', 'RegisterController@getSignUp');
Route::post('sign-up', 'RegisterController@postSignUp')->name('signup');

Route::get('sign-in', 'LoginController@getLogin');
Route::post('sign-in', 'LoginController@postLogin')->name('login');

Route::get('logout', 'LoginController@postLogout')->name('logout');

Route::resource('posts', 'PostController');
Route::resource('profiles', 'ProfileController');

Route::get('places', 'ProvinceController@index')->name('places');

Route::group(['prefix' => 'admin'], function () {
    Route::get('users', 'AdminController@getUsers')->name('users');
    Route::get('posts', 'AdminController@getPosts')->name('posts');
});

Route::resource('comments', 'CommentController');
Route::post('comments/reply', 'CommentController@replyStore')->name('reply');

