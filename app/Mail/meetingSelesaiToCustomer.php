<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\pemesanan;

class meetingSelesaiToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;
    public $rekening;
    public $jumlah_dibayar;

    public function __construct(pemesanan $pemesanan, $rekening, $jumlah_dibayar)
    {
        $this->pemesanan = $pemesanan;
        $this->rekening = $rekening;
        $this->jumlah_dibayar = $jumlah_dibayar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "[".config('app.name')."] Lakukan Pelunasan Pembayaran pesanan anda";
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.customer.meetingSelesaiToCustomer')
        ->with(['subject' => $subject]);
    }
}
