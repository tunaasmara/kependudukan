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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coba', 'HomeController@coba')->name('coba');
Route::get('/provinsi/{provinsi}', 'ProvinsiController@create')->name('provinsi.create');


Route::get('/surat-input', 'HomeController@suratInput')->name('suratInput');
Route::get('/surat-data', 'HomeController@suratData')->name('suratData');

Route::get('/penduduk-input', 'HomeController@pendudukInput')->name('pendudukInput');
Route::get('/penduduk-data', 'HomeController@pendudukData')->name('pendudukData');

Route::get('/kk-input', 'HomeController@kkInput')->name('kkInput');
Route::get('/kk-data', 'HomeController@kkData')->name('kkData');
