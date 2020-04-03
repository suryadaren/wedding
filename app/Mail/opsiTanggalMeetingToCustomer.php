<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\pemesanan;

class opsiTanggalMeetingToCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;
    public $tanggal_meeting;

    public function __construct(pemesanan $pemesanan,$tanggal_meeting)
    {
        $this->pemesanan = $pemesanan;
        $this->tanggal_meeting = $tanggal_meeting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "[".config('app.name')."] Wedding organizer telah menginput opsi tanggal meeting";
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.customer.opsiTanggalMeetingToCustomer')
        ->with(['subject' => $subject]);
    }
}
