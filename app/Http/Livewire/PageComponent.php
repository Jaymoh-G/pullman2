<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
use Livewire\WithPagination;

class PageComponent extends Component{
    use WithPagination;
    public $showDeleteMessage = false;
    public $pageId;

    public function render(){
        $pages = Page::orderBy('updated_at', 'desc')->paginate(10);
        return view('livewire.page-component',['pages'=>$pages])->layout('layouts.base');
    }

    public function delete($pageId){
        Page::where('id',$pageId)->delete();
        session()->flash('message', 'Page deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/page/list');

    }

    public function showDeleteModal($pageId){
        $this->showDeleteMessage = true;
        $this->pageId = $pageId;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
