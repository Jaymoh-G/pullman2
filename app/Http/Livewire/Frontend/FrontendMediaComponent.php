<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Media;
use App\Models\Album;
use Livewire\Component;
use App\Http\Livewire\Frontend\FrontendMediaComponent;
use Illuminate\Support\Facades\Storage;

class FrontendMediaComponent extends Component{
    public $videos;
    public $photos;
    public $podcasts;
    public $albums;

    public function mount(){
        // get all album
        $this->albums = Album::all();
        $this->videos = Media::where('category', 'video')->get();
        $this->photos = Media::where('category', 'image')->get();
        $this->podcasts = Media::where('category', 'podcast')->get();
    }

    public function render(){
        return view('livewire.frontend.media-component')->layout('layouts.web',['activePage'=>'media']);
    }
}
