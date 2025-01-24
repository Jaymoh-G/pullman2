<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSectionData extends Model
{
    use HasFactory;
    protected $table = 'page_section_data';
    public $primaryKey = 'id';
    public $timestamps = true;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public function pageSection(){
        return $this->belongsTo(PageSection::class);
    }
}
