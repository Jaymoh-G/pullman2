<?php

namespace App\Http\Livewire;

use Newsletter;
use App\Models\Blog;
use Livewire\Component;
use App\Models\WhatWeDo;
use App\Mail\ContactUsMail;
use Livewire\WithPagination;
use App\Mail\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\NewsletterSubscription;


class LatestCategory extends Component
{
    public $name;
    public $subject;
    public $phone;
    public $message;
    public $title;
    public $metaDescription;
    public $whatWeDos;


    public function mount()
    {

        $this->whatWeDos = WhatWeDo::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        // get category from route
        $tag = request()->tag;
        $category = request()->categorySlug;
        $blogs = Blog::join('categories', 'categories.id', '=', 'blogs.category_id')
            ->select('blogs.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('categories.slug', '=', $category)
            ->when($tag, function ($query) use ($tag) {
                return $query->where('tags', 'like', '%' . $tag . '%');
            })
            ->orderBy('blogs.updated_at', 'desc')
            ->paginate(12);
        // dd($blogs);
        if ($blogs->count() > 0) {
            $this->title = $blogs[0]->category->name;
        } else {
            $this->title = ucwords(str_replace('-', ' ', $category));
        }

        $metaDescription = $this->title
            ? $this->title . ' news and projects from Pullman Excavators Kenya.'
            : 'Latest projects from Pullman Excavators Kenya.';

        return view('livewire.latest-category', ['blogs' => $blogs])->layout('layouts.web', [
            'activePage' => 'latest',
            'title' => ($this->title ?: 'Latest') . ' | Pullman Excavators Kenya',
            'metaDescription' => $metaDescription,
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
}
