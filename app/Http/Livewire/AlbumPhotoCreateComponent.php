<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AlbumPhoto;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumPhotoCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $album_id;
    public $albumPhotoId;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];
    
    public function mount(){
        $this->albumPhotoId = request('id');
        $this->album_id = request('albumId');
        if ($this->albumPhotoId) {
            $album = AlbumPhoto::find($this->albumPhotoId);
            $this->title = $album->title;
            $this->image = $album->image;
            $this->album_id = $album->album_id;
        }
    }

    public function render(){
        return view('livewire.album-photo-create-component')->layout('layouts.base');
    }

    public function create(){
        $this->validate([
            'title' => 'required',
        ]);
        $data = [
            'title' => $this->title,
            'image' => $this->image ?: '',
            'album_id' => $this->album_id
        ];

        if ($this->albumPhotoId) {
            $albumPhoto = AlbumPhoto::find($this->albumPhotoId);
            $albumPhoto->update($data);
            session()->flash('message', 'Photo updated successfully');
        } else {
            AlbumPhoto::create($data);
            session()->flash('message', 'Photo created successfully');
        }
        redirect()->to('admin/album/photo/list?albumId='.$this->album_id);
    }

    public function fileUpload($fileData){             
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/albumsPhotos/'.$pdfName,base64_decode($image));
        $this->image = 'storage/albumsPhotos/' . $pdfName;      
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];   
    }
}
