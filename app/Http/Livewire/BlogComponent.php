<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class BlogComponent extends Component{
    use WithPagination;
    public $showDeleteMessage = false;
    public $blogId;

    public function render(){
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(5);
        $categories = Category::all();
        return view('livewire.blog-component', ['blogs' => $blogs, 'categories' => $categories])->layout('layouts.base');
    }

    public function confirmDelete($blogId){
        $this->showDeleteMessage = true;
        $this->blogId = $blogId;
    }

    public function deleteBlog()    {
        if (!empty($this->blogId)) {
            Blog::destroy($this->blogId);
        }
        $this->blogId = null;
        session()->flash('message', 'Blog has been deleted successfully');
        $this->showDeleteMessage = false;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }

    public function getCategoryName($categoryId){
        $category = Category::find($categoryId);
        return $category?$category->name:'blog';
    }
}
