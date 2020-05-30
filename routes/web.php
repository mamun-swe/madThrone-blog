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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => 'auth'], function () {
    Route::get('/profile', 'Admin\ProfileController@index')->name('profile');
    Route::get('/profile/edit', 'Admin\ProfileController@edit')->name('profile.edit');

    Route::resource('/post', 'Admin\PostController');
});
