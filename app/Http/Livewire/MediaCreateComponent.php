<?php

namespace App\Http\Livewire;

use App\Models\Media;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaCreateComponent extends Component{
    use WithFileUploads;

    public $title;
    public $description;
    public $file_path;
    public $category;
    public $video_link;
    public $mediaId;
    public $file_size;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];

    public function mount(){
        $this->mediaId = request('id');
        if ($this->mediaId) {
            $media = Media::find($this->mediaId);
            $this->title = $media->title;
            $this->description = $media->description;
            $this->file_path = $media->file_path;
            $this->category = $media->category;
            $this->video_link = $media->video_link;
        }
    }

    public function render(){
        return view('livewire.media-create-component')->layout('layouts.base');
    }

    public function createMedia(){
        $this->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10|max:190',
            'category' => 'required',
        ]);

        if ($this->video_link) {
            $this->validate([
                'video_link' => 'required|url'
            ]);
        }

        $this->file_path = is_object($this->file_path) ? $this->upload($this->file_path) : $this->file_path;

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'video_link' => $this->video_link ?: '',
            'file_path' => $this->file_path ?: '',
            'file_size' => $this->file_size ?: '',
            'slug' => Str::slug($this->title)
        ];

        if ($this->mediaId) {
            $media = Media::find($this->mediaId);
            $media->update($data);
            session()->flash('message', 'Media item updated successfully');
        } else {
            Media::create($data);
            session()->flash('message', 'Media item created successfully');
        }
        redirect()->to('admin/media/list');
    }

    public function updatedCategory($category){
        $this->category = $category;
    }

    public function fileUpload($fileData){             
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $audioExtension = ['mp3','wav','ogg','flac','aac','wma','m4a','mp4','3gp','webm','aiff','wax','wma','voc','vox'];
        foreach($audioExtension as $extension){
            $image = str_replace('data:audio/x-'.$extension.';base64,', '', $image);
        }
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/media/'.$pdfName,base64_decode($image));
        $this->file_path = 'storage/media/' . $pdfName;      
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];   
    }
}