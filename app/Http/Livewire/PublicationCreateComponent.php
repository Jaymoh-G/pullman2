<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Publication;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\PublicationCategory;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PublicationCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $file_path;
    public $temp_file_path;
    public $publication_image;
    public $temp_publication_image;
    public $category_names;
    public $publicationId;
    public $file_size;
    public $fileName;
    public $fileExtension;
    public $fileNameWithoutExtension;
    public $files = [];
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];

    public function mount(){
        $this->publicationId = request('id');
        $this->categories = PublicationCategory::all();

        if ($this->publicationId) {
            $publication = Publication::find($this->publicationId);
            $this->title = $publication->title;
            $this->description = $publication->description;
            $this->file_path = $publication->file_path;
            $this->temp_file_path = $publication->file_path;
            $this->publication_image = $publication->publication_image;
            $this->temp_publication_image = $publication->publication_image;
            $this->category_names = unserialize($publication->category_names);
            $this->file_size = $publication->file_size;

        }
    }

    public function render(){
        return view('livewire.publication-create-component')->layout('layouts.base');
    }

    public function createPublication($description){
        $this->validate([
            'title' => 'required|min:5',
            'category_names' => 'required',
        ]);

        $data = [
            'title' => $this->title,
            'description' => $description,
            'file_path' => $this->file_path,
            'publication_image' => $this->publication_image,
            'file_size' => $this->file_size,
            'slug' => Str::slug($this->title),
            'category_names'=>is_array($this->category_names)?serialize($this->category_names):$this->category_names,
        ];

        if ($this->publicationId) {
            $publication = Publication::find($this->publicationId);
            $publication->update($data);
            session()->flash('message', 'Publication updated successfully');
        } else {
            Publication::create($data);
            session()->flash('message', 'Publication created successfully');
        }
        redirect()->to('admin/our-work/latest');
    }

    public function fileUpload($fileData){
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:application/pdf;base64,', '', $fileData);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/publications/'.$pdfName,base64_decode($image));
        if($this->fileExtension == 'pdf'){
            $this->file_path = 'storage/publications/' . $pdfName;
        }else{
            $this->publication_image = 'storage/publications/' . $pdfName;
        }
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];
        if($this->fileExtension == 'pdf'){
            $this->file_size = $fileData['file_size'];
        }
    }

}
