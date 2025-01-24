<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventCreateComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $title;
    public $description;
    public $date_from;
    public $date_to;
    public $moderator;
    public $registrationLink;
    public $image;
    public $location;
    public $time_from;
    public $time_to;
    public $timeZone;
    public $eventId;
    public $listeners = [
        "file_upload" => 'fileUpload',
        "set_file_data" => 'setFileData',
    ];

    public function mount()
    {
        $eventId = request('id');
        if ($eventId) {
            $event = Event::find($eventId);
            $this->name = $event->name;
            $this->title = $event->title;
            $this->description = $event->description;
            $this->date_from = $event->date_from->toDateString();
            $this->date_to = $event->date_to->toDateString();
            $this->moderator = $event->moderator;
            $this->registrationLink = $event->registrationLink;
            $this->image = $event->image;
            $this->location = $event->location;
            $this->timeZone = $event->timeZone;
            $this->time_from = $event->time_from;
            $this->time_to = $event->time_to;
            $this->eventId = $eventId;
        }
    }

    public function render()
    {
        return view('livewire.event-create-component')->layout('layouts.base');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'timeZone' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'location' => 'required|min:3'
        ]);

        // validate date
        if ($this->date_from > $this->date_to) {
            session()->flash('error', 'Date from must be less than date to');
            return;
        }
        $data = [
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'moderator' => $this->moderator,
            'registrationLink' => $this->registrationLink ?: '',
            'image' => $this->image,
            'location' => $this->location,
            'timeZone' => $this->timeZone,
            'time_to' => $this->time_to,
            'time_from' => $this->time_from,
            'slug' => Str::slug($this->name)
        ];

        if ($this->eventId) {
            $event = Event::find($this->eventId);
            $event->update($data);
            session()->flash('message', 'Event updated successfully');
        } else {
            Event::create($data);
            session()->flash('message', 'Event created successfully');
        }

        $this->resetInput();
        session()->flash('success', 'Event created successfully!');
        redirect()->to('/admin/event/list');
    }

    public function resetInput()
    {
        $this->name = null;
        $this->title = null;
        $this->description = null;
        $this->dateFrom = null;
        $this->dateTo = null;
        $this->moderator = null;
        $this->registrationLink = null;
        $this->image = null;
        $this->location = null;
        $this->timeZone = null;
        $this->timeFrom = null;
        $this->timeTo = null;
    }

    public function fileUpload($fileData)
    {
        $pdfName = $this->fileNameWithoutExtension . '_' . time() . '.' . $this->fileExtension;
        $image = str_replace('data:image/jpg;base64,', '', $fileData);
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        Storage::disk('public')->put('/events/' . $pdfName, base64_decode($image));
        $this->image = 'storage/events/' . $pdfName;
    }

    public function setFileData($fileData)
    {
        $this->fileName = $fileData['file_name'];
        $this->fileExtension = $fileData['file_extension'];
        $this->fileNameWithoutExtension = $fileData['file_name_without_extension'];
    }
}
