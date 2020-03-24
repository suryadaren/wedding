<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function logout(){
    	$notif = [
			"message" => "anda telah logout dari sistem!",
			"alert-type" => "success"
		];
		auth()->guard('customer')->logout();
		return redirect(url('/login'))->with($notif);
    }
}
