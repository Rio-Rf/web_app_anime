<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voice_actor extends Model
{
    use HasFactory;
    
    public function animes(){
        return $this->belongsToMany(Anime::class);
    }
}
