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
	return redirect('/home');
});

Auth::routes();

//Frontend
Route::get('/home', 'HomeController@index')->name('home');

Route::get('pesan/{id}', 'PesanController@index');
Route::post('pesan/{id}', 'PesanController@pesan');
Route::get('check-out', 'PesanController@check_out');
Route::delete('check-out/{id}', 'PesanController@delete');

Route::get('konfirmasi-check-out', 'PesanController@konfirmasi');

Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@update');

Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@detail');

//Backend
Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'Auth\AdminLoginController@login']);
Route::post('admin-logout', 'Auth\AdminLoginController@logout');

Route::group(['middleware' => ['auth:admin']], function () {

	Route::get('admin-create', 'Auth\AdminLoginController@showRegisterPage');
	Route::post('admin-create', 'Auth\AdminLoginController@register')->name('admin.register');

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	Route::get('/transaksi', 'TransaksiController@index');
	Route::get('/transaksi/detail/{id}', 'TransaksiController@detail');
	Route::get('/transaksi/selesai', 'TransaksiController@transaksi_selesai');
	Route::get('/transaksi/detail_selesai/{id}', 'TransaksiController@detail_selesai');
	Route::get('/transaksi/gagal', 'TransaksiController@transaksi_gagal');
	Route::get('/transaksi/detail_gagal/{id}', 'TransaksiController@detail_gagal');
	Route::get('/transaksi/proses/{id}/{status}', 'TransaksiController@proses');

	Route::get('/barang', 'BarangController@index');
	Route::post('/barang/create', 'BarangController@create');
	Route::get('/barang/edit/{id}', 'BarangController@edit');
	Route::post('/barang/update/{id}', 'BarangController@update');
	Route::get('/barang/delete/{id}', 'BarangController@delete');

	Route::get('/kategori', 'KategoriController@index');
	Route::post('/kategori/create', 'KategoriController@create');
	Route::get('/kategori/edit/{id}', 'KategoriController@edit');
	Route::post('/kategori/update/{id}', 'KategoriController@update');
	Route::get('/kategori/delete/{id}', 'KategoriController@delete');

	Route::get('/users', 'UsersController@index');
	Route::get('/users/edit/{id}', 'UsersController@edit');
	Route::post('/users/update/{id}', 'UsersController@update');
	Route::get('/users/delete/{id}', 'UsersController@delete');

});