<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditorDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.editor-dashboard-component')->layout('layouts.base');
    }
}
