<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\pemesanan;

class pembayaranPesananCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;
    public $rekening;
    public $dp;

    public function __construct(pemesanan $pemesanan, $rekening, $dp)
    {
        $this->pemesanan = $pemesanan;
        $this->rekening = $rekening;
        $this->dp = $dp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "[".config('app.name')."] Lakukan Pembayaran untuk pesanan anda";
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.pembayaranPesananCustomer')
        ->with(['subject' => $subject]);
    }
}
