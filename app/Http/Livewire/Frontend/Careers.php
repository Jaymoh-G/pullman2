<?php

namespace App\Http\Livewire\Frontend;
use Newsletter;
use Carbon\Carbon;
use App\Models\Job;
use Livewire\Component;
use App\Models\Subscription;
use App\Mail\WelcomeSubscriber;
use App\Models\PageSectionData;
use Illuminate\Support\Facades\Mail;


class Careers extends Component
{
    public $jobs;
    public $name;
    public $email;
    public function mount(){
        $this->sectionOneData = $this->getSectionData('Working at Power Shift Africa');
        $this->sectionTwoData = $this->getSectionData('Open Positions');
        $this->jobs = Job::where('deadline', '>=', Carbon::now()->subDay())->orderBy('deadline', 'asc')->get();         
    }
    public function render(){
        return view('livewire.frontend.careers')->layout('layouts.web',['activePage'=>'joinUs']);
    }
    function mailchimpSubscribe(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        try{
            if(Newsletter::isSubscribed($this->email)){
                $this->emptyInput();
               return redirect()->back()->with('message', 'You are already subscribed');
            }else{
                Newsletter::subscribe($this->email, ['FNAME' => $this->name, 'LNAME' => '']);
                $this->emptyInput();
                return redirect()->back()->with('message', 'You have successfully subscribed');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function emptyInput(){
        $this->name = null;
        $this->email = null;
    }

    function getSectionData($sectionName){
        return PageSectionData::join('page_sections', 'page_section_data.page_section_id', '=', 'page_sections.id')
                ->join('pages', 'page_sections.page_id', '=', 'pages.id')
                ->select('page_section_data.*', 'page_sections.name as page_section_name', 'pages.name as page_name')
                ->where('page_sections.name', 'like', '%'.$sectionName.'%')
                ->where('pages.name', 'like', '%Join us%')
                ->latest('page_sections.updated_at')->first();
    }

}
