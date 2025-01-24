<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Blog;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;

class Latest extends Component
{
  public function render()
  {
    $WaterSewer = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
      ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
      ->where('categories.name', '=', 'Water and Sewer Works')
      ->orderBy('blogs.updated_at', 'desc')

      ->take(3)->get();

    $Excavation = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
      ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
      ->where('categories.name', '=', 'Excavation and Dumping')
      ->orderBy('blogs.updated_at', 'desc')

      ->take(3)->get();

    $Equipment = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
      ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
      ->where('categories.name', '=', 'Equipment and Machine Hire')
      ->orderBy('blogs.updated_at', 'desc')

      ->take(3)->get();

    $Materials = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
      ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
      ->where('categories.name', '=', 'Building Materials Supply')
      ->orderBy('blogs.updated_at', 'desc')

      ->take(3)->get();

    $News = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
      ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
      ->where('categories.name', '=', 'news')
      ->orderBy('blogs.updated_at', 'desc')

      ->take(3)->get();
    $events = Event::orderBy('date_from', 'desc')->take(3)->get();
    return view('livewire.frontend.latest', ['News' => $News, 'events' => $events, 'WaterSewer' => $WaterSewer, 'Excavation' => $Excavation, 'Equipment' => $Equipment, 'Materials' => $Materials])->layout('layouts.web', ['activePage' => 'latest', 'title' => "Latests on Pullman Excavators Kenya", 'metaDescription' => 'Latest on water and sewer works,Excavation and dumping, Equipment and machine hire, building material supply']);
  }
}
