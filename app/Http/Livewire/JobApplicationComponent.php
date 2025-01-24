<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\JobApplication;
use App\Models\Job;

class JobApplicationComponent extends Component
{
    public $jobId;
    public $job;
    public $applicationId;
    public $showDeleteMessage = false;
    public $applications;

    public function mount(){
        $this->jobId = request()->id;
        $this->job = Job::find($this->jobId);
        $this->applications = JobApplication::where('job_id', $this->jobId)->get();
    }

    public function render(){      
        return view('livewire.job-application-component')->layout('layouts.base');
    }

     public function delete($applicationId){
        JobApplication::where('id',$applicationId)->delete();
        session()->flash('message', 'Application deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/job/applications?id='.$this->jobId);
    }

    public function showDeleteModal($commentId){
        $this->showDeleteMessage = true;
        $this->commentId = $commentId;
    }

    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
