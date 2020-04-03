<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class review extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'review';

    protected $fillable = [
        'customer_id', 'wedding_organizer_id', 'pemesanan_id','bintang', 'komentar'
    ];

    public function customer(){
    	return $this->belongsTo(customer::class,'customer_id');
    }
}