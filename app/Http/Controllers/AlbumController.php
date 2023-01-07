<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function displayAll(){
        $albums = Album::with('album_types')->get();

        return response()->json($albums);
    }
}
