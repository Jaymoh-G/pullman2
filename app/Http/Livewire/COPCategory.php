<?php

namespace App\Http\Livewire;

use Newsletter;
use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Models\NewsletterSubscription;

class COPCategory extends Component
{
    public $name;
    public $email;
    public $title;

    public function render()
    {
        // get category from route
        $tag = request()->tag;
        $subcategory = request()->subCategorySlug;
        $blogs = Blog::join('sub_categories', 'sub_categories.id', '=', 'blogs.subcategory_id')
            ->select('blogs.*', 'sub_categories.name as sub_category_name', 'sub_categories.slug as sub_category_slug')
            ->where('sub_categories.slug', '=', $subcategory)
            ->when($tag, function ($query) use ($tag) {
                return $query->where('tags', 'like', '%' . $tag . '%');
            })
            ->orderBy('blogs.updated_at', 'desc')
            ->paginate(12);


        //get title
        if ($blogs[0]) {
            $this->title = $blogs[0]->sub_category_name;
        }


        return view('livewire.cop-category', ['blogs' => $blogs])->layout('layouts.web', ['activePage' => 'cop27']);
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
