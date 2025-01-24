<?php

namespace App\Models;

use App\Models\PublicationCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model{
    use HasFactory;
    protected $table = 'publications';
    public $primaryKey = 'id';
    public $timestamps = true;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    // publciation has many quotecards
    public function quotecards(){
        return $this->hasMany(QuoteCard::class);
    }
}
