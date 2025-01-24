<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Publication;
use App\Models\PublicationCategory;

class PublicationComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $publicationId;

    public function render()
    {
        $publications = Publication::orderBy('updated_at', 'desc')->paginate(10);
        return view('livewire.publication-component', ['publications' => $publications])->layout('layouts.base');
    }

    public function delete($publicationId){
        Publication::where('id',$publicationId)->delete();
        session()->flash('message', 'Comment deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/our-work/latest');
    }

    public function showDeleteModal($publicationId){
        $this->showDeleteMessage = true;
        $this->publicationId = $publicationId;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
