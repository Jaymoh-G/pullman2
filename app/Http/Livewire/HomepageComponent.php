<?php

namespace App\Http\Livewire;


use Newsletter;
use App\Models\Blog;
use App\Models\Event;
use Livewire\Component;
use App\Models\Category;
use App\Models\Petition;
use App\Models\Publication;
use App\Models\PageSectionData;
use App\Models\Page;
use App\Models\PageSection;
use App\Mail\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Http\Livewire\ContactUs;
use App\Mail\ContactUsMail;
use App\Models\Testimonial;

class HomepageComponent extends Component
{

    public $title;
    public $name;
    public $subject;
    public $phone;
    public $message;
    public $publication;
    public $categories;
    public $latestPressRelease;
    public $petition;
    public $sliders;
    public $sectionOneData;
    public $sectionTwoData;
    public $Water;
    public $News;
    public $testimonial;

    public function mount()
    {
        $this->sectionOneData = $this->getSectionData('Crafting foundations, Building Africa');
        $this->sectionTwoData = $this->getSectionData('Our Mission');
        $this->sectionThreeData = $this->getSectionData('Join Us');
        $this->sliders = PageSectionData::where('type', 'slider')->orderBy('created_at', 'asc')->take(4)->get();
        $this->petition = Petition::orderBy('id', 'desc')->take(1)->get();
        $this->latestPressRelease = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('categories.name', '=', 'Equipment and Machine Hire')
            ->take(3)->latest('blogs.updated_at')->get();
        $this->latestPowershiftNews = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('categories.name', '=', 'Excavation and Demolition')
            ->take(2)->latest('blogs.updated_at')->get();

        $this->Water = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('categories.name', '=', 'Civil Works')
            ->take(2)->latest('blogs.updated_at')->get();

        $this->News = Blog::join('categories', 'blogs.category_id', '=', 'categories.id')
            ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('categories.name', '=', 'News')
            ->take(2)->latest('blogs.updated_at')->get();

        $this->latestEvent = Event::orderBy('date_from', 'desc')->take(1)->get();
        $this->title = "Power shift Africa";
        $this->publications = Publication::orderBy('updated_at', 'desc')->take(2)->get();
    }

    public function render()
    {
        return view('livewire.homepage-component')->layout('layouts.web', ['activePage' => 'home',  'title' => "Excavator Hire | Equipment Hire | Lowloader services ,Grader, Dozer ...", 'metaDescription' => 'We do provide - Excavation (Earthworks) and Equipment/Machine Hire services in Kenya. Call 0726634673 We are Kenya best Excavating company/contractor.']);
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }


    function emptyInput()
    {
        $this->name = null;
        $this->email = null;
    }

    function getSectionData($sectionName)
    {
        return PageSectionData::join('page_sections', 'page_section_data.page_section_id', '=', 'page_sections.id')
            ->join('pages', 'page_sections.page_id', '=', 'pages.id')
            ->select('page_section_data.*', 'page_sections.name as page_section_name', 'pages.name as page_name')
            ->where('page_sections.name', 'like', '%' . $sectionName . '%')
            ->where('pages.name', 'like', '%homepage%')
            ->latest('page_sections.updated_at')->first();
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
}
