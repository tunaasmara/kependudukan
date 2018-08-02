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
// Route::resource('provinsi', 'ProvinsiController');
// Route::get('/fetchProvinsi', ['as' => 'fetch.provinsi', 'uses' => 'ProvinsiController@fetchProvinsi']);
// Route::get('/fetchDataProvinsi/{provinsi}', ['as' => 'fetch.data.provinsi', 'uses' => 'ProvinsiController@fetchDataProvinsi']);

// // kabupaten
// Route::resource('kabupaten', 'KabupatenController');
Route::get('/fetchDesa/{kecamatan}', 'DesaController@fetchDesa');
Route::get('/fetchKecamatan/{kabupaten}','KecamatanController@fetchKecamatan');
Route::get('/fetchKabupaten/{provinsi}', 'KabupatenController@fetchKabupaten');
Route::get('/fetchProvinsi','ProvinsiController@fetchProvinsi');


// // kecamatan
// Route::resource('kecamatan', 'KecamatanController');
// Route::get('/fetchKecamatan', 'KecamatanController@fetchKecamatan');
// Route::get('/fetchDataKecamatan/{kecamatan}','KecamatanController@fetchDataKecamatan');
// Route::get('/kecamatan-fetchKabupaten/{provinsi}','KecamatanController@fetchKabupaten');

// // desa
// Route::resource('desa', 'DesaController');
// Route::get('/fetchDataDesa/{desa}','DesaController@fetchDataDesa');
// Route::get('/fetchDesaKecamatan/{kabupaten}','DesaController@fetchDesaKecamatan');

// dusun
Route::resource('dusun', 'DusunController');
Route::get('/fetchDusun', 'DusunController@fetchDusun');
Route::get('/fetchDataDusun/{dusun}', 'DusunController@fetchDataDusun');
Route::get('/formFetchDusun/{desa}', 'DusunController@formFetchDusun');

// rw
Route::resource('rw', 'RwController');
Route::get('/fetchRw', 'RwController@fetchRw');
Route::get('/fetchDataRw/{rw}', 'RwController@fetchDataRw');
Route::get('/formFetchRw/{dusun}', 'RwController@formFetchRw');

// rw
Route::resource('penduduk', 'PendudukController');
Route::get('/fetchPenduduk', 'PendudukController@fetchPenduduk');

// rt
Route::resource('rt', 'RtController');
Route::get('/fetchRt', 'RtController@fetchRt');
Route::get('/fetchDataRt/{rt}', 'RtController@fetchDataRt');


Route::get('/surat-input', 'AdminHomeController@suratInput')->name('suratInput');
Route::get('/surat-data', 'AdminHomeController@suratData')->name('suratData');

Route::get('/penduduk-ktp', 'AdminHomeController@pendudukKtp')->name('pendudukKtp');
Route::get('/penduduk-sku', 'AdminHomeController@pendudukSku')->name('pendudukSku');

Route::get('/kk-input', 'AdminHomeController@kkInput')->name('kkInput');
Route::get('/kk-data', 'AdminHomeController@kkData')->name('kkData');

Route::get('/lahir', function(){
	return view('template.suratLahir');
});


Route::get('/domisili', function(){
	return view('template.suratDomisili');
});

Route::get('/usaha', function(){
	return view('template.suratUsaha');
});
