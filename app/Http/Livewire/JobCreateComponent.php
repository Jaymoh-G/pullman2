<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Illuminate\Support\Str;

class JobCreateComponent extends Component{
    public $title;
    public $slug;
    public $description;
    public $updateMode = false;
    public $jobId;
    public $deadline;
    public $location;
    public $job_type;

    public function mount(){
        $jobId = request('id');
        if ($jobId) {
            $this->jobId = $jobId;
            $this->updateMode = true;
            $job = Job::find($jobId);
            $this->title = $job->title;
            $this->slug = $job->slug;
            $this->description = $job->description;
            $this->deadline = $job->deadline;
            $this->location = $job->location;
            $this->job_type = $job->job_type;

        }
    }

    public function render(){
        return view('livewire.job-create-component')->layout('layouts.base');
    }

    public function save($description){
        $this->validate([
            'title' => 'required',
            'deadline' => 'required|date',
            'location' => 'required',
            'job_type' => 'required',


        ]);

        if ($this->updateMode) {
            $job = Job::find($this->jobId);
            $job->title = $this->title;
            $job->slug = Str::slug($this->title);
            $job->description = $description;
            $job->deadline = $this->deadline;
            $job->location = $this->location;
            $job->job_type = $this->job_type;

            $job->save();
            session()->flash('message', 'Job Updated Successfully');
        } else {
            $job = new Job();
            $job->title = $this->title;
            $job->slug =Str::slug($this->title);
            $job->description = $description;
            $job->deadline = $this->deadline;
            $job->location = $this->location;
            $job->job_type = $this->job_type;

            $job->save();
            session()->flash('message', 'Job Created Successfully');
        }
        $this->resetInput();
        redirect()->route('admin.job');
    }

    public function resetInput(){
        $this->title = '';
        $this->description = '';
        $this->deadline = '';
    }

    public function delete($id){
        $job = Job::find($id);
        $job->delete();
        session()->flash('message', 'Job Deleted Successfully');
    }
}
