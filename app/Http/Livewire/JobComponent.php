<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Job;
use Livewire\WithPagination;


class JobComponent extends Component
{
    use WithPagination;
    public $showDeleteMessage = false;
    public $jobId;


    public function render()
    {
        $jobs = Job::orderBy('updated_at', 'desc')->paginate(5);
        return view('livewire.job-component', ['jobs' => $jobs])->layout('layouts.base');
    }
    public function confirmDelete($jobId)
    {
        $this->showDeleteMessage = true;
        $this->jobId = $jobId;
    }
    public function deleteJob()
    {
        if (!empty($this->jobId)) {
            Job::destroy($this->jobId);
        }
        $this->jobId = null;
        session()->flash('message', 'Job has been deleted successfully');
        $this->showDeleteMessage = false;
    }

    public function closeModal()
    {
        $this->showDeleteMessage = false;
    }
}
