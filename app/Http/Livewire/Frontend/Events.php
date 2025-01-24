<?php

namespace App\Http\Livewire\Frontend;
use Newsletter;
use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use App\Mail\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscription;
use Illuminate\Support\Facades\Storage;

class Events extends Component
{
    public $pastEvents;
    public $upcomingEvents;
    public $name;
    public $email;

    public function mount(){
        // get event where date_to is greater than yesterday
        $this->upcomingEvents = Event::where('date_to', '>=', Carbon::now()->subDay())->orderBy('date_from', 'asc')->take(2)->get();
        $this->pastEvents = Event::where('date_to', '<=', Carbon::now()->subDay())->orderBy('date_from', 'desc')->take(6)->get();
    }
    public function render(){
        return view('livewire.frontend.events')->layout('layouts.web',['activePage'=>'latest']);
    }
 function mailchimpSubscribe(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        try{
            if(Newsletter::isSubscribed($this->email)){
                $this->emptyInput();
               return redirect()->back()->with('message', 'You are already subscribed');
            }else{
                Newsletter::subscribe($this->email, ['FNAME' => $this->name, 'LNAME' => '']);
                $this->emptyInput();
                return redirect()->back()->with('message', 'You have successfully subscribed');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
     function emptyInput(){
        $this->name = null;
        $this->email = null;
    }
}
