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
        'customer_id', 'paket_wedding_organizer_id', 'wedding_organizer_id', 'tanggal', 'harga', 'alamat', 'nama_pengantin_pria', 'nama_pengantin_wanita', 'tanggal_meeting', 'status'
    ];

    public function paket(){
    	return $this->belongsTo(paket_wedding_organizer::class,'paket_wedding_organizer_id');
    }
    public function item_tambahans(){
    	return $this->hasMany(item_tambahan::class);
    }
    public function pembayarans(){
        return $this->hasMany(pembayaran::class);
    }
    public function customer(){
        return $this->belongsTo(customer::class,'customer_id');
    }
    public function wedding_organizer(){
        return $this->belongsTo(wedding_organizer::class,'wedding_organizer_id');
    }
}