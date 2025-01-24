<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Petition;

class PetitionComponent extends Component{
    public $showDeleteMessage = false;
    public $petitionId;

    public function mount(){

        $this->petitions = Petition::all()->sortByDesc('updated_at');
    }

    public function render(){
        return view('livewire.petition-component')->layout('layouts.base');
    }

    public function confirmDelete($petitionId){
        $this->showDeleteMessage = true;
        $this->petitionId = $petitionId;
    }
    public function deletePetition(){
        if (!empty($this->petitionId)) {
            Petition::destroy($this->petitionId);
        }
        $this->petitionId = null;
        session()->flash('message', 'Petition deleted successfully');
        $this->showDeleteMessage = false;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
