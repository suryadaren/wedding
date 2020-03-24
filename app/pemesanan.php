<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class pemesanan extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'pemesanan';

    protected $fillable = [
        'customer_id', 'paket_wedding_organizer_id', 'tanggal', 'harga', 'alamat', 'nama_pengantin_pria', 'nama_pengantin_wanita', 'tanggal_meeting', 'status'
    ];
}