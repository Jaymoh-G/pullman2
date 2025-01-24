<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AlbumPhoto;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class AlbumPhotoComponent extends Component
{
    public $showDeleteMessage = false;
    public $deleteModal = false;
    public $editingCategory;
    public $albumPhotoId;
    public $albumId;
    public $photos;

    public function mount(){        
        $this->albumId = request('albumId');
        $this->photos = AlbumPhoto::where('album_id', $this->albumId)->get();
    }

    public function render(){
        return view('livewire.album-photo-component')->layout('layouts.base');
    }

    public function deleteAlbumPhoto(){
        AlbumPhoto::destroy($this->albumPhotoId);
        $this->showDeleteMessage = false;
        session()->flash('message', 'Photo deleted.');        
        redirect()->to('/admin/album/photo/list');
    }

    public function showDeleteModal($albumPhotoId){
        $this->showDeleteMessage = true;
        $this->albumPhotoId = $albumPhotoId;
    }
    
    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
