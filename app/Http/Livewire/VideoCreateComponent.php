<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class VideoCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $category = 'video';
    public $video_link;
    public $mediaId;

    public function mount(){
        $this->mediaId = request('id');
        if ($this->mediaId) {
            $media = Media::find($this->mediaId);
            $this->title = $media->title;
            $this->description = $media->description;
            $this->category = $media->category;
            $this->video_link = $media->video_link;
        }
    }

    public function render(){
        return view('livewire.video-create-component')->layout('layouts.base');
    }

    public function createMedia(){
        $this->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'video_link' => 'required|url'
        ]);

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'video_link' => $this->video_link,
        ];

        if ($this->mediaId) {
            $media = Media::find($this->mediaId);
            $media->update($data);
            session()->flash('message', 'Video updated successfully');
        } else {
            Media::create($data);
            session()->flash('message', 'Video created successfully');
        }
        redirect()->to(route('admin.media.list'));
    }
}
