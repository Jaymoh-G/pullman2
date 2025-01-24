<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\CompanyTeam;

class TeamComponent extends Component
{
    public $director;
    public $teamMembers;
    public $teamMember;

    public function mount(){
        $this->director = CompanyTeam::where('position', 'Director')->get();
        // get teammembers by updated_at

        $this->teamMembers = CompanyTeam::where('position', '!=', 'Director')->get()->sortBy('updated_at');
    }

    public function render(){
        return view('livewire.frontend.team-component')->layout('layouts.web',['activePage'=>'aboutUs']);
    }
}
