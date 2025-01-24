<?php

namespace App\Http\Livewire;

use App\Models\Album;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $created_by;
    public $cover_image;
    public $albumId;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];
    
    
    public function mount(){
        $this->albumId = request('id');
        if ($this->albumId) {
            $album = Album::find($this->albumId);
            $this->title = $album->title;
            $this->created_by = $album->created_by;
            $this->cover_image = $album->cover_image;
        }
    }

    public function render(){
        return view('livewire.album-create-component')->layout('layouts.base');
    }

    public function createAlbum(){
        $this->validate([
            'title' => 'required|min:5',
        ]);
        $data = [
            'title' => $this->title,
            'created_by' => Auth::user()->name,
            'cover_image' => $this->cover_image ?: ''
        ];

        if ($this->albumId) {
            $album = Album::find($this->albumId);
            $album->update($data);
            session()->flash('message', 'Album updated successfully');
        } else {
            Album::create($data);
            session()->flash('message', 'Album created successfully');
        }
        redirect()->to('admin/album/list');
    }

    public function fileUpload($fileData){             
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/albums/'.$pdfName,base64_decode($image));
        $this->cover_image = 'storage/albums/' . $pdfName;      
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];   
    }

}
