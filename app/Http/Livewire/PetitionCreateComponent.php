<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetitionCreateComponent extends Component{
    public $title;
    public $description;
    public $url;
    public $display;
    public $petitionId;
    public $petitioner;

    public function mount(){
        $petitionId = request('id');
        if ($petitionId) {
            $petition = Petition::find($petitionId);
            $this->title = $petition->title;
            $this->url = $petition->petition_url;
            $this->description = $petition->description;
            $this->display = $petition->display;
            $this->petitionId = $petition->id;
            $this->petitioner = $petition->petitioner;
        }
    }

    public function render(){
        $petitions = Petition::all();
        return view('livewire.petition-create-component', ['petitions' => $petitions])->layout('layouts.base');
    }

    public function save(){
        $this->validate([
            'title' => 'required',
            'url' => 'required|url',
            'description' => 'required',
        ], [
            'title.required' => 'Title is required',
            'url.required' => 'URL is required',
            'url.url' => 'URL is not valid',
            'description.required' => 'Description is required',
        ]);
        $data = [
            'title' => $this->title,
            'petition_url' => $this->url,
            'display' => $this->display,
            'petitioner' => Auth::user()->name,
            'description' => $this->description,
        ];

        if ($this->petitionId) {
            $petition = Petition::find($this->petitionId);
            $petition->update($data);
            session()->flash('message', 'Petition has been updated successfully');
        } else {
            Petition::create($data);
            session()->flash('message', 'Petition has been created successfully');
        }

        $this->resetInput();
        redirect()->to(route('admin.petition.list'));
    }

    public function resetInput(){
        $this->name = null;
        $this->title = null;
        $this->petitionId = null;
    }
}
