<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;
    protected $table = 'page_sections';
    public $primaryKey = 'id';
    public $timestamps = true;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

   /**
     * Get the page section data.
     */
    public function pageSectionData(){
        return $this->hasMany(PageSectionData::class);
    }
}
