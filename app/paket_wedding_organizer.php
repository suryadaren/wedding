<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class paket_wedding_organizer extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'paket_wedding_organizer';

    protected $fillable = [
        'wedding_organizer_id', 'nama_paket', 'deskripsi', 'harga', 'foto'
    ];

    public function wedding_organizer(){
    	return $this->belongsTo(wedding_organizer::class,'wedding_organizer_id');
    }

    public function item_pakets(){
    	return $this->hasMany(item_paket::class);
    }
}