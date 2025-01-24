<?php

namespace App\Http\Livewire;

use App\Models\Album;
use Livewire\Component;
use App\Models\AlbumPhoto;
use App\Models\Publication;
use Livewire\WithPagination;

class AlbumComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $albumId;

    public function render(){
        $albums = Album::orderBy('updated_at', 'desc')->paginate(10);
        return view('livewire.album-component',['albums'=>$albums])->layout('layouts.base');
    }

    public function delete($albumId){
        Album::where('id',$albumId)->delete();
        session()->flash('message', 'Album deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/album/list');
    }

    public function showDeleteModal($albumId){
        $this->showDeleteMessage = true;
        $this->albumId = $albumId;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
