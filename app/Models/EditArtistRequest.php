<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditArtistRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'artist_id',
        'body',
        'status'
    ];

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
