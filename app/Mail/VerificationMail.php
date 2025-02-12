<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name; // User's name
    public $linked; // User's name

    /**
     * Create a new message instance.
     */
    public function __construct($name, $linked)
    {
        $this->name = $name;
        $this->linked = $linked;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Email De Verification - ATITO.NET")
            ->view('emails.verification')
            ->with([
                'name' => $this->name,
                'link' => $this->linked,
            ]);
    }
}
