<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'admin';

    protected $fillable = [
        'user_id', 'alamat', 'nomor_telepon', 'nama_bank', 'nomor_rekening', 'nama_pemilik', 'foto_profil'
    ];
    
    public function user(){
    	return $this->belongsTo(user::class,'user_id');
    }
}