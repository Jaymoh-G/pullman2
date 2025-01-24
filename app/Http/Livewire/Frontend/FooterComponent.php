<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Category;

class FooterComponent extends Component
{
    public $categories;
    public function render()
    {
          $this->categories = Category::all();
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();
        return view('livewire.frontend.footer-component', ['blogs' => $blogs])->layout('layouts.web');
    }
}
