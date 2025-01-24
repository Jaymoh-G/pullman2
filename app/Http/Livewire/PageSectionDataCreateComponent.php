<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PageSection;
use Livewire\WithFileUploads;
use App\Models\PageSectionData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageSectionDataCreateComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $text;
    public $image;
    public $icon;
    public $link;
    public $type;
    public $sectionId;
    public $pageId;
    public $section;
    public $sectionData;
    public $sectionDataId;
    public $tempImage;
    public $tempIcon;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];
    
    public function mount(){
        $this->sectionId = request('sectionId');
        $this->sectionData = PageSectionData::where('page_section_id', $this->sectionId)->first(); 
        $this->section = PageSection::find($this->sectionId);
        if ($this->sectionData) {                       
            $this->name = $this->sectionData->name;
            $this->text = $this->sectionData->text;
            $this->image = $this->sectionData->image;
            $this->icon = $this->sectionData->icon;
            $this->tempImage = $this->sectionData->image;
            $this->tempIcon = $this->sectionData->icon;
            $this->link = $this->sectionData->link;
            $this->type = $this->sectionData->type;
            $this->sectionDataId = $this->sectionData->id;
        }
    }

    public function render(){
        return view('livewire.page-section-data-create-component')->layout('layouts.base');
    }

    public function create($text){
        $this->validate([
            'name' => 'required|min:5'
        ],[
            'name.required' => 'Enter the title',
            'name.min' => 'Title must be at least 5 characters'   
        ]);
        $data = [
            'name' => $this->name,            
            'text' => $text,
            'icon' => $this->icon ?: '',
            'link' => $this->link,
            'image' => $this->image ?: '',
            'page_section_id' => $this->sectionId ?: null
        ];

        if ($this->sectionDataId) {
            $sectionData = PageSectionData::find($this->sectionDataId);
            $sectionData->update($data);
            session()->flash('message', 'Section data updated successfully');
        } else {
            PageSectionData::create($data);
            session()->flash('message', 'Section data created successfully');
        }
        redirect()->to('admin/page/section/list?id='.$this->sectionId.'&pageId='.$this->section->page_id);
    }

    public function fileUpload($fileData){             
        $pdfName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/sectionData/'.$pdfName,base64_decode($image));
        if($this->fileType == 'image'){
            $this->image = 'storage/sectionData/' . $pdfName; 
        }
        if($this->fileType == 'icon'){
            $this->icon = 'storage/sectionData/' . $pdfName; 
        }             
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension']; 
        $this->fileType = $fileData['file_type'];  
    }
}
