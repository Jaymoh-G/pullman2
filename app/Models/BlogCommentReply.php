<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCommentReply extends Model{
    use HasFactory;

    protected $table = "blog_comment_replies";

    protected $guarded = [];
    
    public function blogComments(){
        return $this->belongsTo(BlogComment::class);
    }
}
