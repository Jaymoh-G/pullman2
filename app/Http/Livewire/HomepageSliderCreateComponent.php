<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PageSectionData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomepageSliderCreateComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $text;
    public $image;
    public $icon;
    public $link;
    public $type;
    public $slideId;
    public $fileType;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];
    
    public function mount(){
        $this->slideId = request('id');
        if ($this->slideId) {
            $slider = PageSectionData::find($this->slideId);
            $this->name = $slider->name;
            $this->text = $slider->text;
            $this->image = $slider->image;
            $this->icon = $slider->icon;
            $this->tempIcon = $slider->icon;
            $this->link = $slider->link;
            $this->type = $slider->type;
        }
    }

    public function render(){
        return view('livewire.homepage-slider-create-component')->layout('layouts.base');
    }

    public function create(){
        $this->validate([
            'name' => 'required|min:5',
        ]);
        $data = [
            'name' => $this->name,            
            'text' => $this->text,
            'icon' => $this->icon ?: '',
            'link' => $this->link,
            'type' => 'slider',
            'image' => $this->image ?: ''
        ];

        if ($this->slideId) {
            $slider = PageSectionData::find($this->slideId);
            $slider->update($data);
            session()->flash('message', 'Slider updated successfully');
        } else {
            PageSectionData::create($data);
            session()->flash('message', 'Slider created successfully');
        }
        redirect()->to('admin/homepage/slider/list');
    }

    public function fileUpload($fileData){             
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/sliders/'.$pdfName,base64_decode($image));
        if($this->fileType == 'image'){
            $this->image = 'storage/sliders/' . $pdfName; 
        }
        if($this->fileType == 'icon'){
            $this->icon = 'storage/sliders/' . $pdfName; 
        }             
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension']; 
        $this->fileType = $fileData['file_type'];  
    }
}
