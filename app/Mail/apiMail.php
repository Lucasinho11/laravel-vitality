<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class apiMail extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public $hour;
    public $date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $time, $date)
    {
        $this->token = $token;
        $this->hour = $time;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.apiValidateReservation');
    }
}
