<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\BlogTag;

class TagComponent extends Component{
    public $showDeleteMessage = false;
    public $deleteModal = false;
    public $editingCategory;
    public $tagId;
    public $tags = [];

    public function mount(){
        $this->tags = BlogTag::all();
    }

    public function render(){
        return view('livewire.tag-component')->layout('layouts.base');
    }

    public function deleteTag(){
        BlogTag::destroy($this->tagId);
        $this->showDeleteMessage = false;
        session()->flash('message', 'Tag deleted.'); 
        return redirect()->route('admin.blog.tags.list');
    }

    public function showDeleteModal($tagId){
        $this->showDeleteMessage = true;
        $this->tagId = $tagId;
    }
    
    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
