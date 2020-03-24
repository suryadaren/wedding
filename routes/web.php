<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/informasi_perusahaan', 'HomeController@informasi_perusahaan');

Route::get('/fasilitas', 'HomeController@fasilitas');

Route::get('/tanggal', 'HomeController@tanggal');

Route::get('/additional', 'HomeController@additional');

Route::get('/ringkasan_pemesanan', 'HomeController@ringkasan_pemesanan');

Route::get('/pembayaran', 'HomeController@pembayaran');

Route::get('/info_pemesanan', 'HomeController@info_pemesanan');

Route::get('/register', 'HomeController@register');
Route::get('/form_register/{type}', 'HomeController@form_register');
Route::post('/simpan_register', 'HomeController@simpan_register');
Route::get('/verifikasi_email', 'HomeController@verifikasi_email')->name('verifikasi_email');

Route::get('/login', 'HomeController@login');
Route::post('/checkLogin', 'HomeController@checkLogin');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){

	Route::get('/logout', 'AdminController@logout');

	Route::get('/', 'AdminController@index');
	Route::put('/edit_profil', 'AdminController@edit_profil');

	Route::get('/wo', 'AdminController@wo');
	Route::get('/lihat_wo/{id}', 'AdminController@lihat_wo');
	Route::post('/hapus_wo', 'AdminController@hapus_wo');

	Route::get('/customer', 'AdminController@customer');
	Route::get('/lihat_customer/{id}', 'AdminController@lihat_customer');
	Route::post('/hapus_customer', 'AdminController@hapus_customer');

	Route::get('/pembayaran', 'AdminController@pembayaran');
	Route::get('/lihat_pembayaran', 'AdminController@lihat_pembayaran');

});


Route::group(['prefix' => 'wo', 'middleware' => 'wedding_organizer'], function(){

	Route::get('/logout', 'WOController@logout');

	Route::get('/', 'WOController@index');
	Route::put('/edit_profil', 'WOController@edit_profil');
	
	Route::get('/pemesanan', 'WOController@pemesanan');
	
	Route::get('/paket', 'WOController@paket');
	
	Route::get('/item_tambahan', 'WOController@item_tambahan');

});


Route::group(['prefix' => 'customer', 'middleware' => 'customer'], function(){

	Route::get('/logout', 'CustomerController@logout');
});