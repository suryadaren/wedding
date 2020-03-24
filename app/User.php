<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'user';

    protected $fillable = [
        'username', 'email', 'password', 'role', 'verified', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin(){
    	return $this->hasOne(admin::class);
    }
    public function wedding_organizer(){
    	return $this->hasOne(wedding_organizer::class);
    }
    public function customer(){
    	return $this->hasOne(customer::class);
    }
}
