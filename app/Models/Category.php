<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d'
    ];
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
}
