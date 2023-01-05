<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function displayAll(){
        $artists = Artist::all();
        return response()->json($artists);
    }

    public function show($id){
        $artist = Artist::where('id', $id)->with('albums')->get();
        return response()->json($artist);
    }
}
