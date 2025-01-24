<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class PageNotFound extends Component
{
    public function render()
    {
        return view('livewire.frontend.page-not-found')->layout('layouts.web');

    }
}
