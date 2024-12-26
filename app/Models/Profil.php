<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = ['user_id', 'umur', 'bio'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
