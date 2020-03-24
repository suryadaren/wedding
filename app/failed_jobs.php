<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class failed_jobs extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'failed_jobs';

    protected $fillable = [
        'connection', 'queue', 'payload', 'exception', 'failed_at'
    ];
}