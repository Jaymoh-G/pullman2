<?php

namespace App\Http\Livewire\Frontend;

use Newsletter;
use Livewire\Component;
use App\Mail\ContactUsMail;
use App\Models\Testimonial;
use App\Mail\WelcomeSubscriber;
use App\Models\PageSectionData;
use Illuminate\Support\Facades\Mail;
use App\Models\NewsletterSubscription;


class AboutUsComponent extends Component
{
    public $name;
    public $subject;
    public $phone;
    public $message;
    public $whoWeAre;
    public $partners;
    public $testimonials;


    public function mount()
    {
        $this->partners = PageSectionData::where('type', 'partner')->orderBy('id', 'desc')->get();
        $this->whoWeAre = $this->getSectionData('Who we are');
        $this->foundingDirector = $this->getSectionData('founding director');
        $this->ourMission = $this->getSectionData('Our mission');
        $this->ourVision = $this->getSectionData('Our vision');
        $this->ourGoals = $this->getSectionData('Our goals');
        $this->testimonials = Testimonial::orderBy('id','desc')->take(2)->get();

    }

    public function render()
    {
        return view('livewire.frontend.about-us-component')->layout('layouts.web', [
            'activePage' => 'aboutUs',
            'title' => 'About Pullman Excavators Kenya | Excavation & Construction',
            'metaDescription' => 'Learn about Pullman Excavators Kenya — excavation, demolition, equipment hire, and building materials supply in Nairobi and across Kenya.',
        ]);
    }

    function resetInput()
    {
        $this->name = '';
        $this->subject = '';
        $this->message = '';
        $this->phone = '';
    }

    function send()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'message' => 'nullable',
        ]);

        $subject = "Request for a Service";

        Mail::to('pullmanconstructions@gmail.com')->send(new ContactUsMail($this->name, $this->subject, $this->message, $this->phone));

        $this->resetInput();
        session()->flash('message', 'Your message has been sent.');
    }


    function getSectionData($sectionName)
    {
        return PageSectionData::join('page_sections', 'page_section_data.page_section_id', '=', 'page_sections.id')
            ->join('pages', 'page_sections.page_id', '=', 'pages.id')
            ->select('page_section_data.*', 'page_sections.name as page_section_name', 'pages.name as page_name')
            ->where('page_sections.name', 'like', '%' . $sectionName . '%')
            ->where('pages.name', 'like', '%about us%')
            ->latest('page_sections.updated_at')->first();
    }
}
