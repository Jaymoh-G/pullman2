<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Publication;
use App\Models\WhatWeDo;
use App\Models\Blog;

class WhatWeDoPages extends Component
{
    public $publications;
    public $slug;
    public $whatWeDos;
    public $latestPressRelease;
    public $metaDescription;
    public $title;
    public $seoTitle;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->whatWeDos = WhatWeDo::where('slug', $this->slug)->first();

        if (!$this->whatWeDos) {
            abort(404);
        }

        $this->metaDescription = $this->whatWeDos->metaDescription;
        $this->title = trim($this->whatWeDos->title);
        $this->seoTitle = $this->whatWeDos->seo_title ?: $this->defaultSeoTitle($this->slug, $this->title);

        $this->publications = Publication::where('category_names', 'like', "%{$this->title}%")->take(5)->get();
        $this->latestPressRelease = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('categories.name', '=', 'Press Releases')
            ->take(3)->latest('blogs.updated_at')->get();
    }

    public function render()
    {
        return view('livewire.frontend.what-we-do-pages')->layout('layouts.web', [
            'activePage' => 'whatWeDo',
            'title' => $this->seoTitle,
            'metaDescription' => $this->metaDescription ?: $this->title,
            'ogImage' => $this->whatWeDos->image,
            'ogType' => 'website',
        ]);
    }

    private function defaultSeoTitle($slug, $title)
    {
        $defaults = [
            'excavation-and-demolition' => 'Excavation & Demolition Nairobi | Pullman Excavators',
            'equipment-and-machine-hire' => 'Excavator & Equipment Hire Nairobi | Pullman Excavators',
            'building-materials-supply' => 'Building Materials Supply Nairobi | Pullman Excavators',
        ];

        return $defaults[$slug] ?? ($title . ' | Pullman Excavators Kenya');
    }
}
