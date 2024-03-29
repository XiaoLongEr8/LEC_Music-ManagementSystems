<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'profile_pic',
        'nationality',
        'bio'
    ];

    public function albums(){
        return $this->hasMany(Album::class);
    }

    public function edit_artist_requests(){
        return $this->hasMany(EditArtistRequest::class);
    }
}
