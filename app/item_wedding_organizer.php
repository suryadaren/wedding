<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class item_wedding_organizer extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'item_wedding_organizer';

    protected $fillable = [
        'wedding_organizer_id', 'nama_item', 'deskripsi', 'harga'
    ];
}