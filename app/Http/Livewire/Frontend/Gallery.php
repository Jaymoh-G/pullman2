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
        $this->album = Album::where('id', $this->albumId)->first();

        if (!$this->album) {
            abort(404);
        }

        $this->photos = AlbumPhoto::where('album_id', $this->albumId)->get();
    }

    public function render(){
        $galleries = Album::all();
        $albumTitle = $this->album->title ?? 'Gallery';

        return view('livewire.frontend.gallery', ['galleries' => $galleries])->layout('layouts.web', [
            'activePage' => 'media',
            'title' => $albumTitle . ' | Gallery | Pullman Excavators',
            'metaDescription' => 'Photo gallery: ' . $albumTitle . ' from Pullman Excavators Kenya.',
        ]);
    }
}
