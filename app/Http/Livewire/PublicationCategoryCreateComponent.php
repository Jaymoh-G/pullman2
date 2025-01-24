<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PublicationCategory;

class PublicationCategoryCreateComponent extends Component
{
    public $categoryId;
    public $category;
    public $name;

    public function mount(){
        $this->categoryId = request('id');
        if ($this->categoryId) {
            $category = PublicationCategory::find($this->categoryId);
            $this->name = $category->name;
        }
    }

    public function render()    {
        return view('livewire.publication-category-create-component')->layout('layouts.base');
    }

    public function createCategory(){
        $this->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $this->name
        ];

        if ($this->categoryId) {
            $category = PublicationCategory::find($this->categoryId);
            $category->update($data);
            session()->flash('message', 'Category updated successfully');
        } else {
            PublicationCategory::create($data);
            session()->flash('message', 'Category created successfully');
        }
        redirect()->to('admin/our-work/category/list');
    }
}
