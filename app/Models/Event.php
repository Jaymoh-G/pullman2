<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    public $primaryKey = 'id';
    protected $dates = ['date_from','date_to'];
    public $timestamps = true;
    const TITLE_EXCERPT_LENGTH = 30;
    const TITLE_ALL_EXCERPT_LENGTH = 70;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public function titleExcerpt(){
        return Str::limit($this->title, Event::TITLE_EXCERPT_LENGTH);
    }

    public function titleAllExcerpt(){
        return Str::limit($this->title, Event::TITLE_ALL_EXCERPT_LENGTH);
    }

    public function registrations(){
        return $this->hasMany(EventRegistration::class);
    }
}
