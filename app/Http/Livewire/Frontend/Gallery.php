<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\AlbumPhoto;
use App\Models\Album;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Gallery extends Component
{
    public $showDeleteMessage = false;
    public $deleteModal = false;
    public $album;
    public $albumPhotoId;
    public $albumId;
    public $photos;

    public function mount(){
        $this->albumId = request()->route('albumId');
        // get from album where id = $albumId
        $this->album = Album::where('id', $this->albumId)->first();
        $this->photos = AlbumPhoto::where('album_id', $this->albumId)->get();
    }

    public function render(){
        $galleries = Album::all();
        return view('livewire.frontend.gallery',['galleries'=>$galleries])->layout('layouts.web');
    }
}
