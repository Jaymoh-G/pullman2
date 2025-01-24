<?php

namespace App\Http\Livewire;

use App\Models\CompanyTeam;
use Livewire\Component;

class TeamBioComponent extends Component
{
    public $slug;
    public function mount(){
         $slug = request('slug');
         $this->teamMember = CompanyTeam::where('slug', $slug)->first();
    }
    public function render()
    {
        return view('livewire.team-bio-component')->layout('layouts.web');
    }
}
