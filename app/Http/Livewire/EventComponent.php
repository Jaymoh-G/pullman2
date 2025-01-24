<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class EventComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $eventId;

    public function render()
    {
       // paginate and order by descending
         $events = Event::orderBy('updated_at', 'desc')->paginate(5);
        return view('livewire.event-component', ['events' => $events])->layout('layouts.base');
    }

    public function confirmDelete($eventId)
    {
        $this->showDeleteMessage = true;
        $this->eventId = $eventId;
    }



    public function deleteEvent()
    {
        if (!empty($this->eventId)) {
            Event::destroy($this->eventId);
        }
        $this->eventId = null;
        session()->flash('message', 'Event has been deleted successfully');
        $this->showDeleteMessage = false;
    }

    public function closeModal()
    {
        $this->showDeleteMessage = false;
    }
}
