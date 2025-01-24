<?php

namespace App\Models;

use App\Models\Publication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationCategory extends Model{
    use HasFactory;

    protected $table = "publication_categories";

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date:Y-m-d'
    ];
}
