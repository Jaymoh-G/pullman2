<?php

namespace App\Http\Livewire\Frontend;

use Newsletter;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class AllEventsComponent extends Component
{
    use WithPagination;
    public $name;
    public $email;

    public function render()
    {
        $Events = Event::all();
        return view('livewire.frontend.all-events-component', ['Events' => $Events])->layout('layouts.web', [
            'activePage' => 'latest',
            'title' => 'All Events | Pullman Excavators Kenya',
            'metaDescription' => 'Browse all events from Pullman Excavators Kenya.',
        ]);
    }

    public function mailchimpSubscribe()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        try {
            if (Newsletter::isSubscribed($this->email)) {
                $this->emptyInput();
                return redirect()->back()->with('message', 'You are already subscribed');
            }

            Newsletter::subscribe($this->email, ['FNAME' => $this->name, 'LNAME' => '']);
            $this->emptyInput();
            return redirect()->back()->with('message', 'You have successfully subscribed');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function emptyInput()
    {
        $this->name = null;
        $this->email = null;
    }
}
