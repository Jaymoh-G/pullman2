<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PetitionSubscriber;

class PetitionSubscribersComponent extends Component
{
    public $petitionSubscriber;
    
    public function mount(){
        $petitionId = request('id');
        $this->petitionSubscribers = PetitionSubscriber::where('petition_id', $petitionId)->orderBy('created_at', 'desc')->get();       
    }

    public function render(){
        return view('livewire.petition-subscribers-component')->layout('layouts.base');
    }
}
