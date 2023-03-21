<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        $subject = "Thank for your contact";
        return $this->subject($subject)
            ->view('client.email.contact-email');
    }
}
