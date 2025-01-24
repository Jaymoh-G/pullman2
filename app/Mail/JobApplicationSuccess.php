<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $title;
    public $email;   
    public $dateToday;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $title , $email, $dateToday)
    {
        $this->name = $name;
        $this->title = $title;
        $this->email = $email;
        $this->dateToday = $dateToday;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Job Application')->markdown('emails.jobApplicationSuccess')->with(['username'=>$this->name,'title'=>$this->title, 'email'=>$this->email, 'dateToday'=>$this->dateToday]);
    }
}
