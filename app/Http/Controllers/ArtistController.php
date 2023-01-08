<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function displayAll(){
        $artists = Artist::paginate(10);
        return view('admin.artist_admin');
    }

    public function show($id){
        $artist = Artist::where('id', $id)->with('albums')->get();
        return response()->json($artist);
    }
}
