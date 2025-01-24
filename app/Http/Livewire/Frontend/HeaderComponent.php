<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;
use App\Models\PublicationCategory;
use App\Models\WhatWeDo;

class HeaderComponent extends Component
{
    public $activePage;
    public $checkActivePage;
    public $query;
    public $categories;
    public $whatWeDos;

    public function mount($activePage){
        $this->activePage = $activePage;
        $this->categories = Category::all();
        $this->publication_categories = PublicationCategory::all();
        $this->whatWeDos = WhatWeDo::orderBy('created_at', 'desc')->get();

    }

    public function render(){
        return view('livewire.frontend.header-component')->layout('layouts.web');
    }

    public function checkActivePage($page){
        return $page == $this->activePage ? 'active' : '';
    }

    public function search(){
        $this->validate([
            'query'=>'required'
        ]);
        return redirect()->route('frontend.search', ['query'=>$this->query]);
    }
}
