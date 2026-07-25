<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WhatWeDo;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class WhatWeDoCreateComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $seo_title;
    public $description;
    public $metaDescription;
    public $image;
    public $partnerCountries;
    public $collaborations;
    public $peopleReached;
    public $whatWeDoId;
    public $slug;
    public $tempImage;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];

    public function mount()
    {
        $this->whatWeDoId = request('id');

        if ($this->whatWeDoId) {
            $whatWeDo = WhatWeDo::find($this->whatWeDoId);
            $this->title = $whatWeDo->title;
            $this->seo_title = $whatWeDo->seo_title;
            $this->description = $whatWeDo->description;
            $this->metaDescription = $whatWeDo->metaDescription;
            $this->image = $whatWeDo->image;
            $this->tempImage = $whatWeDo->image;
            $this->partnerCountries = $whatWeDo->partnerCountries;
            $this->collaborations = $whatWeDo->collaborations;
            $this->peopleReached = $whatWeDo->peopleReached;
            $this->slug = $whatWeDo->slug;
        }
    }

    public function updatedTitle($value)
    {
        if (!$this->whatWeDoId || empty($this->slug)) {
            $this->slug = Str::slug($value);
        }
    }

    public function render()
    {
        return view('livewire.what-we-do-create-component')->layout('layouts.base');
    }

    public function create($description)
    {
        $this->validate([
            'title' => 'required|min:5',
            'seo_title' => 'nullable|max:70',
            'slug' => 'required|min:3|max:191',
            'metaDescription' => 'required|min:3|max:158',
        ], [
            'metaDescription.max' => 'Meta description maximum length is 158 characters',
            'seo_title.max' => 'SEO title maximum length is 70 characters',
        ]);

        $slug = Str::slug($this->slug);
        $existing = WhatWeDo::where('slug', $slug)
            ->when($this->whatWeDoId, function ($query) {
                return $query->where('id', '!=', $this->whatWeDoId);
            })
            ->exists();

        if ($existing) {
            $this->addError('slug', 'This slug is already in use.');
            return;
        }

        $data = [
            'title' => $this->title,
            'seo_title' => $this->seo_title ?: null,
            'description' => $description,
            'metaDescription' => $this->metaDescription,
            'image' => $this->image ?: null,
            'slug' => $slug,
            'partnerCountries' => $this->partnerCountries,
            'collaborations' => $this->collaborations,
            'peopleReached' => $this->peopleReached,
        ];

        if ($this->whatWeDoId) {
            $whatWeDo = WhatWeDo::find($this->whatWeDoId);
            $whatWeDo->update($data);
            session()->flash('message', 'What we do item updated successfully');
        } else {
            WhatWeDo::create($data);
            session()->flash('message', 'What we do item created successfully');
        }
        redirect()->to(route('admin.whatWeDo.list'));
    }

    public function fileUpload($fileData)
    {
        $pdfName = $this->fileNameWithoutExtension . '_' . time() . '.' . $this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/whatWeDo/' . $pdfName, base64_decode($image));
        $this->image = 'storage/whatWeDo/' . $pdfName;
    }

    public function setFileData($fileData)
    {
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];
    }
}
