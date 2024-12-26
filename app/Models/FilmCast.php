<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmCast extends Model
{
    use HasFactory;
    protected $table = 'actors';
    protected $fillable = ['film_id', 'cast_id', 'role'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

    public function cast()
    {
        return $this->belongsTo(Cast::class, 'cast_id');
    }
}
