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

// User CRUD
Route::resource('users', 'UserController');
Route::get('/fetchUser', ['as' => 'fetch.user', 'uses' => 'UserController@fetchUser']);
Route::get('/fetchDataUser/{user}', ['as' => 'fetch.data.user', 'uses' => 'UserController@fetchDataUser']);
Route::get('/fetchRoles', ['as' => 'fetch.roles', 'uses' => 'UserController@fetchRoles']);

// Alamat CRUD
Route::get('/alamat', 'AlamatController@index')->name('admin.alamat');
// provinsi
Route::resource('provinsi', 'ProvinsiController');
Route::get('/fetchProvinsi', ['as' => 'fetch.provinsi', 'uses' => 'ProvinsiController@fetchProvinsi']);
Route::get('/fetchDataProvinsi/{provinsi}', ['as' => 'fetch.data.provinsi', 'uses' => 'ProvinsiController@fetchDataProvinsi']);

// kabupaten
Route::resource('kabupaten', 'KabupatenController');
Route::get('/fetchKabupaten', 'KabupatenController@fetchKabupaten');
Route::get('/fetchDataKabupaten/{kabupaten}','KabupatenController@fetchDatakabupaten');
Route::get('/kabupaten-fetchProvinsi','KabupatenController@fetchProvinsi');


// kecamatan
Route::resource('kecamatan', 'KecamatanController');
Route::get('/fetchKecamatan', 'KecamatanController@fetchKecamatan');
Route::get('/fetchDataKecamatan/{kecamatan}','KecamatanController@fetchDataKecamatan');
Route::get('/kecamatan-fetchKabupaten/{provinsi}','KecamatanController@fetchKabupaten');

// desa
Route::resource('desa', 'DesaController');
Route::get('/fetchDesa', 'DesaController@fetchDesa');
Route::get('/fetchDataDesa/{desa}','DesaController@fetchDataDesa');
Route::get('/fetchDesaKecamatan/{kabupaten}','DesaController@fetchDesaKecamatan');