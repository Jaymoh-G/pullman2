<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class CategoryCreateComponent extends Component
{
    public $categoryId;
    public $category_id;
    public $category;
    public $name;
    public $slug;
    public $sCategorySlug;
    public $sCategoryId;

    public function mount()
    {

        $this->categoryId = request('id');
        if ($this->categoryId) {
            $category = Category::find($this->categoryId);
            $this->name = $category->name;
        }
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-create-component', ['categories' => $categories])->layout('layouts.base');
    }
    public function create()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name)
        ];


        if ($this->category_id) {
            $sCategory = new SubCategory();
            $sCategory->name = $this->name;
            $sCategory->slug =  Str::slug($this->name);
            $sCategory->category_id = $this->category_id;
            $sCategory->save();
        } elseif ($this->categoryId) {
            $category = Category::find($this->categoryId);
            $category->update($data);
            session()->flash('message', 'Category updated successfully');
        } else {
            Category::create($data);
            session()->flash('message', 'Category created successfully');
        }
        return redirect()->route('admin.blog.categories.list');
    }
}
