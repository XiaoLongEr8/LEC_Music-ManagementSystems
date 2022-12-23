<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'genres');
    }

    public function edit_song_requests(){
        return $this->hasMany(EditSongRequest::class);
    }
}
