<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class item_tambahan extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'item_tambahan';

    protected $fillable = [
        'pemesanan_id', 'item_wedding_organizer_id'
    ];


    public function item(){
    	return $this->belongsTo(item_wedding_organizer::class,'item_wedding_organizer_id');
    }
}