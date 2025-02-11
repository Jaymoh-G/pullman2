<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Publication;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Testimonial;

class TestimonialsCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $file_path;
    public $temp_file_path;
    public $testimonialImage;
    public $testimonialImageTemp;
    public $position;
    public $testimonialId;
    public $file_size;
    public $fileName;
    public $fileExtension;
    public $fileNameWithoutExtension;
    public $files = [];
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];

    public function mount(){
        $this->testimonialId = request('id');
        if ($this->testimonialId) {
            $testimonial = Testimonial::find($this->testimonialId);
            $this->name = $testimonial->name;
            $this->description = $testimonial->description;
            $this->position = $testimonial->position;
            $this->testimonialImage = $testimonial->testimonialImage;
            $this->testimonialImageTemp = $testimonial->publication_image;
        }
    }

    public function render(){
        return view('livewire.testimonials-create')->layout('layouts.base');
    }

    public function createTestimonial($description){
        $this->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255'
        ]);

        $data = [
            'name' => $this->name,
            'position' => $this->position,
            'description' => $description,
            'image' => $this->testimonialImage 
        ];
        // var_dump($data);
        // exit;

        // Create or update the testimonial
        Testimonial::updateOrCreate(
            ['id' => $this->testimonialId],
            $data
        );

        session()->flash('message', $this->testimonialId ? 'Testimonial updated successfully!' : 'Testimonial created successfully!');
        $this->reset(); // Reset form fields
         return redirect()->route('testimonials.index'); // Redirect to index page
    }

    public function fileUpload($fileData){
        $imageName = $this->fileNameWithoutExtension.'_'.time().'.'.$this->fileExtension;
        $image = str_replace('data:application/pdf;base64,', '', $fileData);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace('data:image/jpg;base64,', '', $image);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/testimonials/'.$imageName,base64_decode($image));
        $this->testimonialImage = 'storage/testimonials/' . $imageName;
    }

    public function setFileData($fileData){
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];
        if($this->fileExtension == 'pdf'){
            $this->file_size = $fileData['file_size'];
        }
    }

}
