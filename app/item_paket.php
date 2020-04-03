<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class item_paket extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'item_paket';

    protected $fillable = [
        'paket_wedding_organizer_id', 'item_wedding_organizer_id', 'harga_awal', 'harga_akhir'
    ];


    public function item(){
    	return $this->belongsTo(item_wedding_organizer::class,'item_wedding_organizer_id');
    }


    public function paket(){
    	return $this->belongsTo(paket_wedding_organizer::class,'paket_wedding_organizer_id');
    }
}