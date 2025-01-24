<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Category;
use App\Models\BlogComment;
use App\Models\BlogCommentReply;

class BlogSinglePage extends Component
{
    public $slug;
    public $user_name;
    public $email;
    public $comment;
    public $title;
    public $metaDescription;
    public $blog;
    public $categories;
    public $blogComments;
    public $comment_id;
    public $category;

    public function mount($slug){
        $this->slug = $slug;
        $this->blog = Blog::where('slug', $this->slug)->first();
        $this->metaDescription = $this->blog->metaDescription;
        $this->categories = Category::all();
        $this->blogComments = BlogComment::where('blog_id', $this->blog->id)->where('approved', '=', 1)->get();
        $this->title = $this->blog->title;
        $this->category = $this->blog->category->name;
    }

    public function render(){
        return view('livewire.frontend.blog-single-page')->layout('layouts.web', ['title'=>$this->blog->title,'metaDescription'=>$this->metaDescription]);
    }

    // create blog comment
    public function createComment($id){
        $this->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ],
        [
            'user_name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email.',
            'comment.required' => 'Please enter your comment.',

        ]);
        $comment = new BlogComment();
        $comment->user_name = $this->user_name;
        $comment->email = $this->email;
        $comment->comment = $this->comment;
        $comment->blog_id = $id;
        $comment->save();
        $this->resetInput();
        $this->emit('commentCreated');
        session()->flash('message', 'Thank you for your comment.');
    }

    public function resetInput(){
        $this->user_name = null;
        $this->email = null;
        $this->comment = null;
    }

    public function replyClick($id){
        $this->comment_id = $id;
    }

    //save reply
    public function saveCommentReply(){
        $this->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ],[
            'user_name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email.',
            'comment.required' => 'Please enter your comment.',

        ]);
        $reply = new BlogCommentReply();
        $reply->user_name = $this->user_name;
        $reply->email = $this->email;
        $reply->comment = $this->comment;
        $reply->comment_id = $this->comment_id;
        $reply->save();
        $this->resetInput();
        session()->flash('message', 'Thank you for your reply.');
    }
}
