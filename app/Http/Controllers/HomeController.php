<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
    	return view('home.index');
    }
    public function informasi_perusahaan(){
        return view('home.informasi_perusahaan');
    }
    public function fasilitas(){
        return view('home.fasilitas');
    }
    public function tanggal(){
        return view('home.tanggal');
    }
    public function additional(){
        return view('home.additional');
    }
    public function ringkasan_pemesanan(){
        return view('home.ringkasan_pemesanan');
    }
    public function pembayaran(){
        return view('home.pembayaran');
    }
    public function info_pemesanan(){
        return view('home.info_pemesanan');
    }
    public function register(){
    	return view('home.register');
    }
    public function login(){
    	return view('home.login');
    }
}
