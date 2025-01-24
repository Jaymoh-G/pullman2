<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PageSectionData;
use Livewire\WithPagination;

class PartnerComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $partnerId;

    public function render(){
        $partners = PageSectionData::where('type','partner')->paginate(10);  
        return view('livewire.partner-component',['partners'=>$partners])->layout('layouts.base');
    }

    public function delete($partnerId){
        PageSectionData::where('id',$partnerId)->delete();
        session()->flash('message', 'Partner deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/partner/list');
    }

    public function showDeleteModal($partnerId){
        $this->showDeleteMessage = true;
        $this->partnerId = $partnerId;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
