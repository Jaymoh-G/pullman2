<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Testimonial;

class Testimonials extends Component
{

     public $testimonials;
    public $title = 'Customer Testimonials'; // ✅ Ensure this is a public property

    public function mount()
    {
        $this->testimonials = Testimonial::latest()->get();
    }

    public function render()
    {
        return view('livewire.frontend.testimonials', [
            'testimonials' => $this->testimonials, // ✅ Ensure testimonials is passed
        ]);
    }
}
