<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewedMovie extends Model{

    use HasFactory;

    protected $fillable = [
        'movie_id',
    ];

    public function reviewedBy(){
        return $this->belongsTo(User::class);
    }
}
