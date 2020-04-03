<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/informasi_perusahaan/{id}', 'HomeController@informasi_perusahaan');

Route::get('/fasilitas', 'HomeController@fasilitas');


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
	Route::get('/lihat_pembayaran/{id}', 'AdminController@lihat_pembayaran');
	Route::post('/setujui_pembayaran', 'AdminController@setujui_pembayaran');
	Route::post('/setujui_pelunasan', 'AdminController@setujui_pelunasan');

	Route::get('/pencairan_dana', 'AdminController@pencairan_dana');
	Route::get('/lihat_pencairan_dana/{id}', 'AdminController@lihat_pencairan_dana');
	Route::post('/pencairan_dana_selesai', 'AdminController@pencairan_dana_selesai');

});


Route::group(['prefix' => 'wo', 'middleware' => 'wedding_organizer'], function(){

	Route::get('/logout', 'WOController@logout');

	Route::get('/', 'WOController@index');
	Route::put('/edit_profil', 'WOController@edit_profil');
	
	Route::get('/pemesanan', 'WOController@pemesanan');
	Route::get('/lihat_pemesanan/{id}', 'WOController@lihat_pemesanan');
	Route::post('/opsi_tanggal_meeting', 'WOController@opsi_tanggal_meeting');
	Route::get('/meeting_selesai/{id}', 'WOController@meeting_selesai');
	Route::get('/pemesanan_selesai/{id}', 'WOController@pemesanan_selesai');
	
	Route::get('/paket', 'WOController@paket');
	Route::get('/tambah_paket', 'WOController@tambah_paket');
	Route::post('/simpan_paket', 'WOController@simpan_paket');
	Route::get('/edit_paket/{id}', 'WOController@edit_paket');
	Route::put('/update_paket', 'WOController@update_paket');
	Route::post('/hapus_paket', 'WOController@hapus_paket');
	Route::get('/tambah_item_paket/{id}', 'WOController@tambah_item_paket');
	Route::post('/simpan_item_paket', 'WOController@simpan_item_paket');
	Route::post('/hapus_item_paket', 'WOController@hapus_item_paket');
	
	Route::get('/item', 'WOController@item');
	Route::get('/data_item/{id}', 'WOController@data_item');
	Route::get('/tambah_item', 'WOController@tambah_item');
	Route::post('/simpan_item', 'WOController@simpan_item');
	Route::get('/edit_item/{id}', 'WOController@edit_item');
	Route::put('/update_item', 'WOController@update_item');
	Route::post('/hapus_item', 'WOController@hapus_item');

});


Route::group(['prefix' => 'customer', 'middleware' => 'customer'], function(){


	Route::get('/', 'CustomerController@index');
	Route::put('/edit_profil', 'CustomerController@edit_profil');

	Route::get('/tanggal/{id}', 'CustomerController@tanggal');
	Route::get('/disableDay/{id}', 'CustomerController@disableDay');

	Route::get('/additional', 'CustomerController@additional');

	Route::post('/simpan_pemesanan', 'CustomerController@simpan_pemesanan');

	Route::get('/ringkasan_pemesanan/{id}', 'CustomerController@ringkasan_pemesanan');

	Route::post('/proses_pesanan', 'CustomerController@proses_pesanan');

	Route::get('/pemesanan', 'CustomerController@pemesanan');
	Route::get('/lihat_pemesanan/{id}', 'CustomerController@lihat_pemesanan');
	Route::post('/simpan_bukti_pembayaran', 'CustomerController@simpan_bukti_pembayaran');
	Route::post('/konfirmasi_tanggal_meeting', 'CustomerController@konfirmasi_tanggal_meeting');
	Route::post('/simpan_bukti_pelunasan', 'CustomerController@simpan_bukti_pelunasan');
	Route::post('/simpan_rating', 'CustomerController@simpan_rating');

	Route::get('/logout', 'CustomerController@logout');
});