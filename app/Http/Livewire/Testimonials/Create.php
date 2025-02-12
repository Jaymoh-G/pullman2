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

    public $name, $position, $message, $image, $testimonial_id, $testimonial;

    public $temp_image;
    public $testimonialImage;
    public $file_size;
    public $fileName;
    public $fileExtension;
    public $fileNameWithoutExtension;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];

    public function mount(){
        // get the id in params
        $testimonialId = $this->testimonial_id = request()->route('id');
        $testimonial = Testimonial::find($testimonialId);
        if($testimonial){
            $this->name = $testimonial->name;
            $this->position = $testimonial->position;
            $this->message = $testimonial->message;
            $this->image = $testimonial->image;
        }
   }

    public function createTestimonial()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $data = [
            'name' => $this->name,
            'position' => $this->position,
            'message' => $this->message,
            'image' => $this->testimonialImage 
        ];

        // Create or update the testimonial
        Testimonial::updateOrCreate(
            ['id' => $this->testimonial_id],
            $data
        );

        session()->flash('message', $this->testimonial_id ? 'Testimonial updated successfully!' : 'Testimonial created successfully!');
        $this->reset(); // Reset form fields
         return redirect()->route('testimonials.index'); // Redirect to index page
    }

    public function render()
    {
        return view('livewire.testimonials.create')->layout('layouts.base');
    }

    public function fileUpload($fileData){
        $imageFile = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:application/pdf;base64,', '', $fileData);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/testimonials/'.$imageFile,base64_decode($image));
        $this->testimonialImage = 'storage/testimonials/' . $imageFile;
        echo $this->testimonialImage;
        exit;
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];
    }
}

