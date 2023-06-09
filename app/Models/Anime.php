<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    
    public function users(){
        return $this->belongsToMany(User::class, 'anime_users')->withPivot('is_active');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function voice_actors(){
        return $this->belongsToMany(Voice_actor::class);
    }
}
