<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
public function build()
{
    return $this->subject('Club Registration Successful')
                ->view('emails.registration_confirmation')
                ->with(['data' => $this->data]); // ✅ Pass the data to the view
}

}
