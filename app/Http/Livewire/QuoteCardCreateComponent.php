<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\QuoteCard;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class QuoteCardCreateComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $position;
    public $image;
    public $body;
    public $quoteCardId;
    public $publicationId;

    public function mount(){
        $this->quoteCardId = request('id');
        $this->publicationId = request('publicationId');
        if ($this->quoteCardId) {
            $quoteCard = QuoteCard::find($this->quoteCardId);
            $this->name = $quoteCard->name;
            $this->position = $quoteCard->position;
            $this->image = $quoteCard->image;
            $this->body = $quoteCard->message;
            $this->publicationId = $quoteCard->publication_id;
        }
    }

    public function render(){
        return view('livewire.quote-card-create-component')->layout('layouts.base');
    }

    public function create($message){
        $this->validate([
            'name' => 'required|min:3',
            'position' => 'required',
        ]);

        if (!$this->quoteCardId) {
            $this->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            ],[
                'image.max' => 'Image size must be less than 6mb',
                'image.required' => 'Image is required',
                'image.mimes' => 'Upload a image file.',
            ]);
        }

        $this->image = is_object($this->image) ? $this->upload($this->image) : $this->image;

        $data = [
            'name' => $this->name,
            'position' => $this->position,
            'image' => $this->image ?: '',
            'message' => $message,
            'publication_id' => $this->publicationId
        ];

        if ($this->quoteCardId) {
            $quoteCard = QuoteCard::find($this->quoteCardId);
            $quoteCard->update($data);
            session()->flash('message', 'Quote card updated successfully');
        } else {
            QuoteCard::create($data);
            session()->flash('message', 'Quote card created successfully');
        }
        
        redirect()->to(route('admin.publications.quoteCard.list') . '?id=' . $this->publicationId);
    }


    function upload($file){
        $fileName = $file->getClientOriginalName();
        $fileName = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $file->storeAs('public/publications', $fileNameToStore);
        return 'storage/publications/' . $fileNameToStore;
    }
}
