<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PageSection;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class PageSectionCreateComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $page_id;
    public $pageSectionId;    
    
    public function mount(){
        $this->pageSectionId = request('id');
        $this->page_id = request('pageId');
        if ($this->pageSectionId) {
            $pageSection = PageSection::find($this->pageSectionId);
            $this->name = $pageSection->name;            
        }
    }

    public function render(){
        return view('livewire.page-section-create-component')->layout('layouts.base');
    }

    public function create(){
        $this->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $this->name,
            'page_id' => $this->page_id
        ];

        if ($this->pageSectionId) {
            $pageSection = PageSection::find($this->pageSectionId);
            $pageSection->update($data);
            session()->flash('message', 'Page section updated successfully');
        } else {
            PageSection::create($data);
            session()->flash('message', 'Page section created successfully');
        }
        redirect()->to('admin/page/section/list?id='.$this->pageSectionId.'&pageId='.$this->page_id);
    }
}
