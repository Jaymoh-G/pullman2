<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteCard extends Model
{
    use HasFactory;
    protected $table = 'quote_cards';
    public $primaryKey = 'id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    // quotecard belongs to a publication
    public function publication(){
        return $this->belongsTo(Publication::class);
    }
}
