<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    public $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    const EXCERPT_LENGTH = 65;
    const TITLE_EXCERPT_LENGTH = 44;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
    public function excerpt()
    {
        return Str::limit($this->body, Blog::EXCERPT_LENGTH);
    }

    public function titleExcerpt()
    {
        return Str::limit($this->title, Blog::TITLE_EXCERPT_LENGTH);
    }
    /**
     * Get the comments for the blog post.
     */
    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }
}
