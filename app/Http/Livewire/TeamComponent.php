<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CompanyTeam;
use Livewire\WithPagination;

class TeamComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $teamId;

    public function render(){
        $teams = CompanyTeam::orderBy('updated_at', 'desc')->paginate(5);
        return view('livewire.team-component', ['teams' => $teams])->layout('layouts.base');
    }

    public function delete($teamId){
        CompanyTeam::where('id',$teamId)->delete();
        session()->flash('message', 'Comment deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/team/list');
    }

    public function showDeleteModal($teamId){
        $this->showDeleteMessage = true;
        $this->teamId = $teamId;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }

    public function getTeamMemberName($teamId){
        if($teamId){
            $team = CompanyTeam::where('id',$teamId)->first();
            return $team->name;
        }
    }
}
