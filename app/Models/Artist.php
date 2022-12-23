<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    public function albums(){
        return $this->hasMany(Album::class);
    }

    public function edit_artist_requests(){
        return $this->hasMany(EditArtistRequest::class);
    }
}
