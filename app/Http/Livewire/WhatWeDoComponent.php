<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\WhatWeDo;

class WhatWeDoComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $whatWeDoId;
    public $whatWeDoName;
    

    public function render(){
        $whatWeDos = WhatWeDo::orderBy('updated_at', 'desc')->paginate(10);
        return view('livewire.what-we-do-component', ['whatWeDos' => $whatWeDos])->layout('layouts.base');
    }

    public function delete(){
        WhatWeDo::where('id',$this->whatWeDoId)->delete();
        session()->flash('message', 'Item deleted.');
        $this->showDeleteMessage = false;
        redirect()->to(route('admin.whatWeDo.list'));
    }

    public function showDeleteModal($what, $name){
        $this->showDeleteMessage = true;
        $this->whatWeDoId = $what;
        $this->whatWeDoName = $name;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
