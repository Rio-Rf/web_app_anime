<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
    use HasFactory;
    
    public function boards(){
        return $this->belongsToMany(Board::class);
    }
    public function animes(){
        return $this->belongsToMany(Anime::class);
    }
}
