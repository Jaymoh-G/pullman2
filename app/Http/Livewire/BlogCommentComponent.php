<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BlogComment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentComponent extends Component
{
    public $blogId;
    public $blog;
    public $commentId;
    public $showDeleteMessage = false;

    public function render(){
        $this->blogId = request('id');
        $this->blog = Blog::find($this->blogId);
        $blogComments = BlogComment::where('blog_id', $this->blogId)->get();
        if($blogComments == null){
            $blogComments = [];
        }
        return view('livewire.blog-comment-component', ['blogComments' => $blogComments])->layout('layouts.base');
    }

    public function approve($commentId){
        BlogComment::where('id',$commentId)->update(['approved'=>true, 'approved_by'=>Auth::user()->name]);
        session()->flash('message', 'Comment approved.');
        redirect()->to('/admin/latest/comments?id='.$this->blogId);
    }

    public function disapprove($commentId){
        BlogComment::where('id',$commentId)->update(['approved'=>false, 'approved_by'=>Auth::user()->name]);
        session()->flash('message', 'Comment disapproved.');
        redirect()->to('/admin/latest/comments?id='.$this->blogId);
    }

    public function delete($commentId){
        BlogComment::where('id',$commentId)->delete();
        session()->flash('message', 'Comment deleted.');
        $this->showDeleteMessage = false;
        redirect()->to('/admin/latest/comments?id='.$this->blogId);
    }

    public function showDeleteModal($commentId){
        $this->showDeleteMessage = true;
        $this->commentId = $commentId;
    }
    
    public function closeModal(){
        $this->showDeleteMessage = false;
    }
}
