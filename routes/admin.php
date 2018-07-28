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

Route::get('/', 'AdminHomeController@index')->name('admin.home');
Route::resource('users', 'UserController');
Route::get('/fetchUser', ['as' => 'fetch.user', 'uses' => 'UserController@fetchUser']);
Route::get('/fetchDataUser/{user}', ['as' => 'fetch.data.user', 'uses' => 'UserController@fetchDataUser']);
Route::get('/fetchRoles', ['as' => 'fetch.roles', 'uses' => 'UserController@fetchRoles']);
