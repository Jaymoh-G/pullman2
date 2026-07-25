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
        return view('livewire.frontend.what-we-do')->layout('layouts.web', [
            'activePage' => 'whatWeDo',
            'title' => $this->title,
            'metaDescription' => 'Excavation and demolition, equipment and machine hire, and building materials supply from Pullman Excavators Kenya.',
        ]);
    }
}
