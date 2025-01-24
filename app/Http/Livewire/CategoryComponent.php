<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    public $categoryId;
    public $name;
    public $slug;


    public $showDeleteMessage = false;
    public $deleteModal = false;


    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-component', ['categories' => $categories])->layout('layouts.base');
    }

    public function delete()
    {
        Category::where('id', $this->categoryId)->delete();
        session()->flash('message', 'Category deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/album/list');
        return redirect()->route('admin.blog.categories.list');
    }

    public function showDeleteModal($categoryId)
    {
        $this->showDeleteMessage = true;
        $this->categoryId = $categoryId;
    }

    public function closeModal()
    {
        $this->showDeleteMessage = false;
    }

    function getCategoryName($categoryId)
    {
        $category = Category::find($categoryId);
        return $category->name;
    }
}
