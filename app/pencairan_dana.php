<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class pencairan_dana extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'pencairan_dana';

    protected $fillable = [
        'pemesanan_id', 'nama_bank', 'nomor_rekening', 'nama_pemilik', 'jumlah', 'bukti_pembayaran', 'status'
    ];

    public function pemesanan(){
        return $this->belongsTo(pemesanan::class,'pemesanan_id');
    }
}