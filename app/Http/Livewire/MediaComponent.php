<?php

namespace App\Http\Livewire;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithPagination;

class MediaComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $mediaId;

    public function render(){
        $mediaItems = Media::orderBy('id', 'desc')->paginate(5);
        return view('livewire.media-component', ['mediaItems' => $mediaItems])->layout('layouts.base');
    }

    public function delete($mediaId){
        Media::where('id',$mediaId)->delete();
        session()->flash('message', 'Comment deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/media/list');
    }

    public function showDeleteModal($mediaId){
        $this->showDeleteMessage = true;
        $this->mediaId = $mediaId;
    }
    
    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}