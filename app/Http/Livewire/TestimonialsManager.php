<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Testimonial;

class TestimonialsManager extends Component
{
    use WithFileUploads;
    public $showDeleteMessage = false;
    public $name, $position, $message, $image, $testimonial_id;
    public $testimonial;  // Store a single testimonial (for edit/update)
    public $updateMode = false;
      public $testimonials =[];

   public function mount()
   {
      $this->testimonials = Testimonial::orderBy('id','desc')->get();
   }

    public function render()
    {
        return view('livewire.testimonials-manager')
            ->layout('layouts.base');

    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'message' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $this->image ? $this->image->store('testimonials', 'public') : null;

        Testimonial::create([
            'name' => $this->name,
            'position' => $this->position,
            'message' => $this->message,
            'image' => $imagePath,
        ]);

        session()->flash('message', 'Testimonial added successfully!');
        $this->resetInput();
    }
       public function getTestimonialName($testimonial_id)
    {
        if ($testimonial_id) {
            $testimonial = Testimonial::where('id', $testimonial_id)->first();
            return $testimonial->name;
        }
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $this->testimonial_id = $id;
        $this->name = $testimonial->name;
        $this->position = $testimonial->position;
        $this->message = $testimonial->message;
        $this->updateMode = true;


    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($this->testimonial_id);
        $testimonial->update([
            'name' => $this->name,
            'position' => $this->position,
            'message' => $this->message,
        ]);

        session()->flash('message', 'Testimonial updated successfully!');
        $this->resetInput();
    }



     public function showDeleteModal($testimonial_id){
        $this->showDeleteMessage = true;
        $this->testimonial_id = $testimonial_id;
    }
    public function closeModal(){
        $this->showDeleteMessage = false;
    }

     public function delete($testimonial_id){
        Testimonial::where('id',$testimonial_id)->delete();
        session()->flash('message', 'Comment deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/testimonials');
    }


    private function resetInput()
    {
        $this->name = '';
        $this->position = '';
        $this->message = '';
        $this->image = null;
        $this->testimonial_id = null;
        $this->updateMode = false;
    }

}
