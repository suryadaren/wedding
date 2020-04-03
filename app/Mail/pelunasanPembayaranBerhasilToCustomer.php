<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\pembayaran;

class pelunasanPembayaranBerhasilToCustomer extends Mailable
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
        $subject = "[".config('app.name')."] Pelunasan Pembayaran berhasil";
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.customer.pelunasanPembayaranBerhasilToCustomer')
        ->with(['subject' => $subject]);
    }
}
