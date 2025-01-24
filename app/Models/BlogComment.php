<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model{
    use HasFactory;
    protected $table = 'blog_comments';
    public $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public function blogs(){
        return $this->belongsTo(Blog::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function blogCommentReplies()
    {
        return $this->hasMany(BlogCommentReply::class);
    }
}

