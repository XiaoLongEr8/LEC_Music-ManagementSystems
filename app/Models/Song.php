<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable=[
        'album_id',
        'title',
        'description',
        'lyrics',
        'view_count'
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'song_genres');
    }

    public function edit_song_requests(){
        return $this->hasMany(EditSongRequest::class);
    }

    public function formattedViews(){
        $number = $this->view_count;
        if ($number >= 1000000000){
            $simplified = number_format($number / 1000000000, 1) . 'b';
        }
        else if ($number >= 1000000) {
            $simplified = number_format($number / 1000000, 1) . 'm';
        }
        elseif ($number >= 1000) {
            $simplified = number_format($number / 1000, 1) . 'k';
        }
        else {
            $simplified = $number;
        }

        return $simplified;
    }
}
