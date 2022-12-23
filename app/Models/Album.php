<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'album_type_id',
        'title',
        'release_date',
        'description',
        'contributors',
        'cover_image'
    ];

    public function album_type(){
        return $this->belongsTo(AlbumType::class);
    }

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function songs(){
        return $this->hasMany(Song::class);
    }
}
