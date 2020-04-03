<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\pembayaran;

class pelunasanPembayaranToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $pembayaran;

    public function __construct(pembayaran $pembayaran)
    {
        $this->pembayaran = $pembayaran;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "[".config('app.name')."] ".$this->pembayaran->customer->nama_lengkap." Melakukan Pelunasan Pembayaran Pesanan";
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.admin.pelunasanPembayaranToAdmin')
        ->with(['subject' => $subject]);
    }
}
