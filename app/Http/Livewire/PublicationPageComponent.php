<?php

namespace App\Http\Livewire;

use Newsletter;
use Livewire\Component;
use App\Models\Publication;
use App\Models\Subscription;
use App\Mail\WelcomeSubscriber;
use App\Models\PublicationCategory;
use Illuminate\Support\Facades\Mail;

class PublicationPageComponent extends Component
{
    public $publication;
    public $name;
    public $email;
    public $categories;

    public function mount()
    {
        $categoryName = request()->category;
        $this->categories = PublicationCategory::all();
        // get all publications order by created_at desc when category name select where category name is not null
        $this->publications = Publication::when($categoryName, function ($query) use ($categoryName) {
            return $query->where('category_names', 'like', '%' . $categoryName . '%');
        })->orderBy('updated_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.publication-page-component')->layout('layouts.web', ['activePage' => 'publications', 'title' => "Our Work", 'metaDescription' => "Some of our past projects and works"]);
    }

    function mailchimpSubscribe()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        try {
            if (Newsletter::isSubscribed($this->email)) {
                $this->emptyInput();
                return redirect()->back()->with('message', 'You are already subscribed');
            } else {
                Newsletter::subscribe($this->email, ['FNAME' => $this->name, 'LNAME' => '']);
                $this->emptyInput();
                return redirect()->back()->with('message', 'You have successfully subscribed');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function emptyInput()
    {
        $this->name = null;
        $this->email = null;
    }
}
