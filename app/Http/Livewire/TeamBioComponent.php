<?php

namespace App\Http\Livewire;

use App\Models\CompanyTeam;
use Livewire\Component;

class TeamBioComponent extends Component
{
    public $slug;
    public $teamMember;

    public function mount()
    {
        $slug = request('slug');
        $this->teamMember = CompanyTeam::where('slug', $slug)->first();

        if (!$this->teamMember) {
            abort(404);
        }
    }

    public function render()
    {
        $name = $this->teamMember->name ?? 'Team Member';

        return view('livewire.team-bio-component')->layout('layouts.web', [
            'activePage' => 'aboutUs',
            'title' => $name . ' | Team | Pullman Excavators',
            'metaDescription' => \Illuminate\Support\Str::limit(strip_tags($this->teamMember->bio ?? ($name . ' at Pullman Excavators Kenya')), 155),
            'ogImage' => $this->teamMember->image ?? null,
        ]);
    }
}
