<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model{
    use HasFactory;
    protected $table = 'petitions';
    public $primaryKey = 'id';
    public $timestamps = true;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];
}
