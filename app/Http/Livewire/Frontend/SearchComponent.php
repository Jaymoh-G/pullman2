<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Publication;
use App\Models\Blog;
use App\Models\Event;
use App\Models\Media;

class SearchComponent extends Component
{
    public $searchTerm;
    public $publications;
    public $blogs;
    public $events;
    public $medias;    
    public $query;    

    public function mount(){
        $this->searchTerm = request()->query('query');

        $this->publications = Publication::where('title', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
            ->get();

        $this->blogs = Blog::where('title', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('author', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('body', 'LIKE', '%' . $this->searchTerm . '%')
            ->get();

        $this->events = Event::where('title', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('name', 'LIKE', '%' . $this->searchTerm . '%')
            ->get();

        $this->media = Media::where('title', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
            ->get();
    }

    public function render(){
        return view('livewire.frontend.search-component')->layout('layouts.web');
    }

    public function search(){
        $this->validate([
            'query'=>'required'
        ]);
        return redirect()->route('frontend.search', ['query'=>$this->query]);
    }
}
