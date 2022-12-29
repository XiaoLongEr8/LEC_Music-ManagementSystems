<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function search(Request $request){
        $query = $request->q;
        $title_res = Song::where('title', 'like', '%'.$query.'%')->orderBy('view_count', 'desc')->get();
        $lyrics_res = Song::where('lyrics', 'like', '%'.$query.'%')->orderBy('view_count', 'desc')->get();
        $artist_res = Artist::where('fullname', 'like', '%'.$query.'%')->get();

        return response()->json([
            'title_result' => $title_res,
            'lyrics_result' => $lyrics_res,
            'artist_result' => $artist_res
        ]);
    }
}
