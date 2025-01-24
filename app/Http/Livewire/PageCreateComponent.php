<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class PageCreateComponent extends Component{
    use WithFileUploads;

    public $name;
    public $created_by;
    public $pageId;

    public function mount(){
        $this->pageId = request('id');
        if ($this->pageId) {
            $page = Page::find($this->pageId);
            $this->name = $page->name;
            $this->created_by = $page->created_by;
        }
    }

    public function render(){
        return view('livewire.page-create-component')->layout('layouts.base');
    }

    public function create(){
        $this->validate([
            'name' => 'required|min:5',
        ]);

        $data = [
            'name' => $this->name,
            'created_by' => Auth::user()->name
        ];

        if ($this->pageId) {
            $page = Page::find($this->pageId);
            $page->update($data);
            session()->flash('message', 'Page updated successfully');
        } else {
            Page::create($data);
            session()->flash('message', 'Page created successfully');
        }
        redirect()->to('admin/page/list');
    }
}
