<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\QuoteCard;
use App\Models\Publication;
use App\Models\PublicationCategory;

class PublicationSinglePage extends Component
{
    public $publication;
    public $slug;
    public $categories;
    public $title;
    public $publicationId;
    public function mount(){
        $this->slug = request('slug');
        $this->publication = Publication::where('slug', $this->slug)->first();

        if (!$this->publication) {
            abort(404);
        }

        $this->publicationId = $this->publication->id;
        $this->categories = Category::all();
        $this->title = $this->publication->title;
        $this->categories = PublicationCategory::all();
    }

    public function render(){
        $quoteCards = QuoteCard::where('publication_id', $this->publicationId)->orderBy('updated_at', 'desc')->get();
        return view('livewire.publication-single-page', ['quoteCards' => $quoteCards])->layout('layouts.web', [
            'activePage' => 'publications',
            'title' => $this->publication->title . ' | Our Work | Pullman Excavators',
            'metaDescription' => \Illuminate\Support\Str::limit(strip_tags($this->publication->description ?? $this->publication->title), 155),
            'ogImage' => $this->publication->publication_image ?? null,
            'ogType' => 'article',
        ]);
    }

    public function getCategoryName($categoryId){
        $category = PublicationCategory::where('id',$categoryId)->first();
        return $category->name;
    }
}
