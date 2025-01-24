<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Component
{
    public $name;
    public $subject;
    public $message;
    public $phone;

    public function render(){
        return view('livewire.frontend.contact-us')->layout('layouts.web',['title' => "Contact Pullman Excavators Kenya", 'metaDescription' => 'Get In Touch']);
    }

    public function send(){
        $this->validate([
            'name' => 'required',

        ]);

        Mail::to('pullmanconstructions@gmail.com')->send(new ContactUsMail($this->name, $this->subject, $this->message, $this->phone));

        $this->resetInput();
        session()->flash('message', 'Your message has been sent.');
    }

    function resetInput(){
        $this->name = '';
        $this->subject = '';
        $this->message = '';
        $this->phone = '';
    }

}
