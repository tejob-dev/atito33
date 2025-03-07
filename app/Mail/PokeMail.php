<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PokeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name; // User's name    
    public $email; // User's name    
    public $messsage; // User's name    

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $messsage)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messsage = $messsage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Un utilisateur vous a contacté - ATITO.NET")
        ->view('emails.poke')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'messsage' => $this->messsage,
        ]);
    }
}
