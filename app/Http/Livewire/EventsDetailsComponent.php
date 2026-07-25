<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;


class EventsDetailsComponent extends Component
{
    public $slug;
    public $event;
    public $otherEvents;
    public $name;
    public $email;
    public $phone;
    public $message;

    public function mount(){
        $this->slug = request('slug');
        $this->event = Event::where('slug', $this->slug)->first();

        if (!$this->event) {
            abort(404);
        }

        $this->otherEvents = Event::inRandomOrder()->take(3)->get();
    }

    public function render(){
        $eventTitle = $this->event->name ?: $this->event->title;

        return view('livewire.events-details-component')->layout('layouts.web', [
            'activePage' => 'latest',
            'title' => $eventTitle . ' | Events | Pullman Excavators',
            'metaDescription' => \Illuminate\Support\Str::limit(strip_tags($this->event->description ?? $eventTitle), 155),
            'ogImage' => $this->event->image ?? null,
        ]);
    }

    public function register(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
            'event_id' => $this->event->id
        ];

        //create new registration or update existing
        $registration = $this->event->registrations()->updateOrCreate(
            ['email' => $this->email],
            $data
        );

        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
        
        session()->flash('message', 'Thank you for registering!');        
    }
}
