<?php

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


Route::get('dashboard', 'AppController@index')->name('dashboard');
Route::post('user/store', 'UsersController@store')->name('save-user');
Route::post('user/get', 'UsersController@get')->name('getUser');
Route::post('user/update', 'UsersController@update')->name('updateUser');
Route::delete('user/destroy', 'UsersController@destroy')->name('deleteUser');
Route::get('user/profile', 'UsersController@profile')->name('profile');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
