<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class WhatWeDo extends Component
{
    public $title;
    public $metaDescription;

    public function mount()
    {
        $this->title = "Pullman Excavators Services";
    }
    public function render()
    {
        return view('livewire.frontend.what-we-do', )->layout('layouts.web', ['activePage' => 'whatWeDo', 'title' => $this->title,'metaDescription' => "WATER AND SEWER WORKS, EXCAVATION AND DUMPING,EQUIPMENTS AND MACHINE HIRE, BUILDING MATERIALS SUPPLY"]);
    }
}
