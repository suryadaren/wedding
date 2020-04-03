<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class wedding_organizer extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'wedding_organizer';

    protected $fillable = [
        'user_id', 'nama_perusahaan', 'alamat', 'nomor_telepon', 'instagram', 'tentang_perusahaan', 'nama_bank', 'nomor_rekening', 'nama_pemilik', 'rating', 'foto_profil', 'foto_ijin_usaha'
    ];

    public function user(){
    	return $this->belongsTo(user::class,'user_id');
    }
    public function paket(){
    	return $this->hasMany(paket_wedding_organizer::class);
    }
    public function items(){
        return $this->hasMany(item_wedding_organizer::class);
    }
    public function reviews(){
        return $this->hasMany(review::class);
    }
    public function pemesanans(){
        return $this->hasMany(pemesanan::class);
    }
}