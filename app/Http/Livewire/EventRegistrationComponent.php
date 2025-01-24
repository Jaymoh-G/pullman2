<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventRegistration;

class EventRegistrationComponent extends Component
{
    public $registrations;
    public $event_id;

    public function mount(){
        $this->event_id = request()->id;
        $this->registrations = EventRegistration::where('event_id', $this->event_id)->get();

    }
    public function render(){
        return view('livewire.event-registration-component')->layout('layouts.base');;
    }
}
