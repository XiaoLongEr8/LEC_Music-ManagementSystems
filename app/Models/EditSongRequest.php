<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditSongRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'song_id',
        'body',
        'status'
    ];

    public function song(){
        return $this->belongsTo(Song::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
