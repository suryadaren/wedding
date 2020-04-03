<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\pemesanan;

class tanggalMeetingTelahDiTetapkanToWo extends Mailable
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
        $subject = "[".config('app.name')."] Tanggal Meeting Telah ditetapkan";
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.wo.tanggalMeetingTelahDiTetapkanToWo')
        ->with(['subject' => $subject]);
    }
}
