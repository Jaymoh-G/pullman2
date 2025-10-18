<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Blog;
use Livewire\Component;

class News extends Component
{
    public function render()
    {
        $pageBanner = [
            'title' => 'News',
            'subtitle' => 'Stay updated with the latest news and updates',
            'background_image' => asset('images/power2.jpg')
        ];

        $news = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('categories.name', '=', 'news')
            ->orderBy('blogs.updated_at', 'desc')
            ->paginate(12);

        return view('livewire.frontend.news', [
            'pageBanner' => $pageBanner,
            'news' => $news
        ])->layout('layouts.web', [
            'activePage' => 'news',
            'title' => "News - Pullman Excavators Kenya",
            'metaDescription' => 'Latest news and updates from Pullman Excavators Kenya'
        ]);
    }
}
