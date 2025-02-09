<?php

namespace App\Http\Livewire\Testimonials;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Create extends Component


{
    use WithFileUploads;

    public $name, $position, $message, $image, $testimonial_id;

    public function createTestimonial()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|max:1024', // Max 1MB image
        ]);

        // Store the image if uploaded
        if ($this->image) {
            $imagePath = $this->image->store('testimonials', 'public');
        }

        // Create or update the testimonial
        Testimonial::updateOrCreate(
            ['id' => $this->testimonial_id],
            [
                'name' => $this->name,
                'position' => $this->position,
                'message' => $this->message,
                'image' => $imagePath ?? null, // If no image uploaded, keep null
            ]
        );

        session()->flash('message', $this->testimonial_id ? 'Testimonial updated successfully!' : 'Testimonial created successfully!');
        $this->reset(); // Reset form fields
         return redirect()->route('testimonials.index'); // Redirect to index page
    }

    public function render()
    {
        return view('livewire.testimonials.create')->layout('layouts.base');
    }
}

