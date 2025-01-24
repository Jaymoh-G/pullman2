<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Blog;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;

class Cop27 extends Component
{
    public function render()
    {

        $explainers = Blog::join('sub_categories', 'blogs.subcategory_id', '=', 'sub_categories.id')
            ->select('blogs.*', 'sub_categories.name as sub_category_name', 'sub_categories.slug as sub_category_slug')
            ->where('sub_categories.name', '=', 'Explainers')
            ->orderBy('blogs.updated_at', 'desc')
            ->take(3)->get();

        $analysis = Blog::join('sub_categories', 'blogs.subcategory_id', '=', 'sub_categories.id')
            ->select('blogs.*', 'sub_categories.name as sub_category_name', 'sub_categories.slug as sub_category_slug')
            ->where('sub_categories.name', '=', 'Analysis')
            ->orderBy('blogs.updated_at', 'desc')
            ->take(3)->get();

        $media = Blog::join('sub_categories', 'blogs.subcategory_id', '=', 'sub_categories.id')
            ->select('blogs.*', 'sub_categories.name as sub_category_name', 'sub_categories.slug as sub_category_slug')
            ->where('sub_categories.name', '=', 'Media')
            ->orderBy('blogs.updated_at', 'desc')
            ->take(3)->get();

        return view('livewire.frontend.cop27', ['explainers' => $explainers, 'analysis' => $analysis, 'media' => $media])->layout('layouts.web', ['activePage' => 'cop27']);
    }
}
