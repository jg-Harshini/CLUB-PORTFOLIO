<?php

namespace App\Mail;
use App\Mail\RegistrationRejectedMail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Club Registration Rejected')
                    ->view('emails.registration_rejected')
                    ->with(['data' => $this->data]);
    }
}

