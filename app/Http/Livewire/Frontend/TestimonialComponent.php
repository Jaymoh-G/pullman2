<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Testimonial;

class TestimonialComponent extends Component
{

    public $testimonials;

  public function mount()
    {
        $this->testimonials = Testimonial::orderBy('id','desc')->get();

    }
    public function render()
    {
        return view('livewire.frontend.testimonial-component')->layout('layouts.web', ['activePage' => 'testimonials']);
    }
}
