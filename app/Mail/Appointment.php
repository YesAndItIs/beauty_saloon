<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Appointment extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('appointment_mail', ['name' => $this->name, 'date' => $this->date]);
    }
}
