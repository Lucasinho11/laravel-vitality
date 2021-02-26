<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
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
    public function __construct($token, $info)
    {
        $this->token = $token;
        $this->hour = $info['time'];
        $this->date = $info['date'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.validateReservation');
    }
}
