<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\sendNewsletter;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscription;

class NewsletterSendMassComponent extends Component
{
    public $attachment;
    public $subject;
    public $body;
    public $category;
    protected $email;
    protected $name;
    

    public function render()
    {
        return view('livewire.newsletter-send-mass-component')->layout('layouts.base');
    }

    public function massSendNewsLetter($bodyContent){
        $this->validate([
            'category' => 'required'
        ]);

        $this->body = $bodyContent;
        if($this->category == 'all'){
            $subscriptions = Subscription::all();
        }else{
            $subscriptions = Subscription::where('category', $this->category)->get();
        }        

        foreach ($subscriptions as $subscription) {
            $this->email = $subscription['email'];
            $this->name = $subscription['name'];
            $this->sendNewsletter();
        }
        $this->subject = '';
        $this->body = '';
        session()->flash('message', 'mails sent successfully!');
        redirect()->to(route('admin.subscription.list'));
    }

    private function sendNewsletter()
    {
        Mail::to($this->email)->send(new sendNewsletter($this->name, $this->subject, $this->body));
    }
}
