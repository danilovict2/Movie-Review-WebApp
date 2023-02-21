<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchlistedMovie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
    ];

    public function watchlisted(){
        return $this->belongsTo(User::class);
    }
}
