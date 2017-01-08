<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('login');
});
Route::get('/masuk', function () {
    return view('login');
});
Route::get('/keluar', 'LoginController@logout');
Route::post('/check','LoginController@check');
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/cetak-pengiriman', 'CetakController@pengiriman')->name('cetak.pengiriman');
Route::get('/cetak-retur', 'CetakController@retur')->name('cetak.retur');
Route::get('/data-obat', 'ObatController@index')->name('obat.index');
Route::get('/input-obat', 'ObatController@suplier')->name('obat.input');
Route::get('/permintaan-obat', 'PesanController@permintaan')->name('pesan.permintaan');
Route::get('/tambah-stok-obat', 'TambahController@tambah')->name('tambah.tambah');
Route::get('/retur-obat', 'ReturController@index')->name('retur.index');
Route::get('/data-retur-obat', 'ReturController@retur');
Route::get('/data-pengiriman-obat', 'TambahController@pb');

Auth::routes();
//Route::get('/', 'MahasiswaController@index')->name('mahasiswa.index');
//Route::post('/input-mahasiswa','MahasiswaController@store')->name('mahasiswa.store');
Route::resource('obat','ObatController');
Route::resource('pesan','PesanController');
Route::resource('tambah','TambahController');
Route::resource('retur','ReturController');
Route::resource('login','LoginController');