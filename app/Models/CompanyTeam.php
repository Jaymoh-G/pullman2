<?php

namespace App\Models;

use App\Models\CompanyTeam;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyTeam extends Model
{
    use HasFactory;

    protected $table = 'company_teams';
    public $primaryKey = 'id';
    public $timestamps = true;
    const EXCERPT_LENGTH = 80;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];


     public function excerpt()
    {
        return Str::limit($this->bio, CompanyTeam::EXCERPT_LENGTH);
    }
}
