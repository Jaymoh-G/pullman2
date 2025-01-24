<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $subject; 
    public $message;
    public $phone;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $subject, $message, $phone){
        $this->name = $name;
        $this->subject = $subject;
        $this->message = $message;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact');
    }
}
