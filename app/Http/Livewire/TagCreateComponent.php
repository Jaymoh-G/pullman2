<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BlogTag;

class TagCreateComponent extends Component
{
    public $tagId;
    public $tag;
    public $name;

    public function mount(){
        $this->tagId = request('id');
        if ($this->tagId) {
            $tag = BlogTag::find($this->tagId);
            $this->name = $tag->name;
        }
    }

    public function render(){
        return view('livewire.tag-create-component')->layout('layouts.base');
    }

    public function create(){
        // validate name required unique
        $this->validate([
            'name' => 'required|unique:blog_tags,name'
        ], [
            'name.required' => 'Tag name is required.',
            'name.unique' => 'Tag name already exists.'
        ]);

        $data = [
            'name' => $this->name
        ];

        if ($this->tagId) {
            $tag = BlogTag::find($this->tagId);
            $tag->update($data);
            session()->flash('message', 'Tag updated successfully');
        } else {
            BlogTag::create($data);
            session()->flash('message', 'Tag created successfully');
        }
        return redirect()->route('admin.blog.tags.list');
    }
}
