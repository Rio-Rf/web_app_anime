<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boards extends Model
{
    use HasFactory;
    
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
    public function users()   
    {
        return $this->hasMany(User::class);  
    }
    public function comments()   
    {
        return $this->hasMany(Comment::class);  
    }
}
