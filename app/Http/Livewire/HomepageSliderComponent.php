<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PageSectionData;
use Livewire\WithPagination;

class HomepageSliderComponent extends Component{
    use WithPagination;
    public $showDeleteMessage = false;
    public $sliderId;

    public function render(){
        $sliders = PageSectionData::where('type','slider')->paginate(10);        
        return view('livewire.homepage-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }

    public function delete($sliderId){
        PageSectionData::where('id',$sliderId)->delete();
        session()->flash('message', 'Slider deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/homepage/slider/list');
    }

    public function showDeleteModal($sliderId){
        $this->showDeleteMessage = true;
        $this->sliderId = $sliderId;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
