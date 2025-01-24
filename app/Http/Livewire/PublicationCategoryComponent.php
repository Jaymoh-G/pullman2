<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\PublicationCategory;

class PublicationCategoryComponent extends Component
{
    public $showDeleteMessage = false;
    public $deleteModal = false;
    public $editingCategory;
    public $categoryId;
    public $categories;

    public function mount(){
        $this->categories = PublicationCategory::all();
    }

    public function render(){
        return view('livewire.publication-category-component')->layout('layouts.base');
    }

    public function deleteCategory(){
        PublicationCategory::destroy($this->categoryId);
        $this->showDeleteMessage = false;
        session()->flash('message', 'Category deleted.');        
        redirect()->to('/admin/publications/category/list');
    }

    public function showDeleteModal($categoryId){
        $this->showDeleteMessage = true;
        $this->categoryId = $categoryId;
    }
    
    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
