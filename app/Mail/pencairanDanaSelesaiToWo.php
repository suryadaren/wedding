<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\pencairan_dana;

class pencairanDanaSelesaiToWo extends Mailable
{
    use Queueable, SerializesModels;

    public $pencairan_dana;

    public function __construct(pencairan_dana $pencairan_dana)
    {
        $this->pencairan_dana = $pencairan_dana;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "[".config('app.name')."] Admin Wedding.co telah melakukan pencairan dana";
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.wo.pencairanDanaSelesaiToWo')
        ->with(['subject' => $subject]);
    }
}
