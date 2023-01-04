<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function search(Request $request){
        $query = $request->q;
        $song_res = Song::where('title', 'like', '%'.$query.'%')->orWhere('lyrics', 'like', '%'.$query.'%')->distinct()->orderBy('view_count', 'desc')->get();
        $artist_res = Artist::where('fullname', 'like', '%'.$query.'%')->get();

        dd($song_res);

        return response()->json([
            'song_result' => $song_res,
            'artist_result' => $artist_res
        ]);
    }

    public function displayAll(){
        $songs = Song::all();
        return response()->json($songs);
    }
}
