<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\pemesanan;

class menungguPencairanDanaToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;

    public function __construct(pemesanan $pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "[".config('app.name')."] permintaan pencairan dana untuk ".$this->pemesanan->wedding_organizer->nama_perusahaan;
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.admin.menungguPencairanDanaToAdmin')
        ->with(['subject' => $subject]);
    }
}
