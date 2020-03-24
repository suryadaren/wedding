<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\user;

class VerifyUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(user $user)
    {
        $this->user = $user;
    }

    
    public function build()
    {
        $subject = "[".config('app.name')."] Verifikasi Email";
        return $this
        ->from('wedding@gmail.com')
        ->subject($subject)
        ->view('mail.VerifyUserMail')
        ->with(['subject' => $subject]);
    }
}
