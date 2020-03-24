<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class customer extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'customer';

    protected $fillable = [
        'user_id', 'nama_lengkap', 'jenis_kelamin', 'alamat', 'nomor_telepon', 'foto_profil'
    ];

    

    public function user(){
    	return $this->belongsTo(user::class,'user_id');
    }
}