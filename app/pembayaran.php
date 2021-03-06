<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class pembayaran extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'pembayaran';

    protected $fillable = [
        'customer_id', 'pemesanan_id', 'nama_bank', 'nomor_rekening', 'nama_pemilik', 'jumlah', 'bukti_pembayaran', 'status'
    ];

    public function customer(){
        return $this->belongsTo(customer::class,'customer_id');
    }

    public function pemesanan(){
        return $this->belongsTo(pemesanan::class,'pemesanan_id');
    }
}