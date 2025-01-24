<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use App\Models\PageSection;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class PageSectionComponent extends Component{
    public $showDeleteMessage = false;
    public $deleteModal = false;
    public $editingCategory;
    public $pageSectionId;
    public $pageId;
    public $pageSections;
    
    public function mount(){        
        $this->pageId = request('pageId');
        $this->pageSections = PageSection::where('page_id', $this->pageId)->orderBy('updated_at', 'desc')->get();
    }

    public function render(){
        return view('livewire.page-section-component')->layout('layouts.base');
    }

    public function deletePageSection(){
        PageSection::destroy($this->pageSectionId);
        $this->showDeleteMessage = false;
        session()->flash('message', 'Page section deleted.');        
        redirect()->to('/admin/page/section/list');
    }

    public function showDeleteModal($pageSectionId){
        $this->showDeleteMessage = true;
        $this->pageSectionId = $pageSectionId;
    }
    
    public function closeModal(){
        $this->showDeleteMessage = false;
    }

    public function getPageName(){
        $page = Page::find($this->pageId);
        return $page->name;
    }
}
