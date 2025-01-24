<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PageSectionData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PartnerCreateComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $type;
    public $partnerId;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];
    
    public function mount(){
        $this->partnerId = request('id');
        if ($this->partnerId) {
            $partner = PageSectionData::find($this->partnerId);
            $this->name = $partner->name;
            $this->text = $partner->text;
            $this->image = $partner->image;
            $this->tempImage = $partner->image;
            $this->icon = $partner->icon;
            $this->link = $partner->link;
            $this->type = $partner->type;
        }
    }

    public function render(){
        return view('livewire.partner-create-component')->layout('layouts.base');
    }

    public function create(){
        $this->validate([
            'name' => 'required|min:5',
        ]);

        $data = [
            'name' => $this->name,  
            'image' => $this->image ?: '',
            'text' => '', 
            'type' => 'partner'            
        ];

        if ($this->partnerId) {
            $partner = PageSectionData::find($this->partnerId);
            $partner->update($data);
            session()->flash('message', 'Partner updated successfully');
        } else {
            PageSectionData::create($data);
            session()->flash('message', 'Partner created successfully');
        }
        redirect()->to('admin/partner/list');
    }

    public function fileUpload($fileData){             
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/partners/'.$pdfName,base64_decode($image));
        $this->image = 'storage/partners/' . $pdfName;      
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];   
    }
}
