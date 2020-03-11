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

Route::get('/login', 'HomeController@login');
