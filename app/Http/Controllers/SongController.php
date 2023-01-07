<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function search(Request $request){
        $query = $request->q;

        $title_search_query = Song::where('title', 'like', '%'.$query.'%');
        $lyrics_search_query = $title_search_query->orWhere('lyrics', 'like', '%'.$query.'%');
        $song_unique_query = $lyrics_search_query->distinct();

        /* Eager load relationship with album and artist, and selects correlated attributes that relates to the searching result
        */
        $song_select_attr = $song_unique_query
        ->selectRaw('id, album_id, title as name, view_count, null as profile_pic')
        ->with(['album' => function($query){
            $query->select(['id', 'title', 'cover_image', 'artist_id'])->with([
                'artist' => function($query){
                    $query->select([ 'id', 'fullname']);
                }
            ]);
        }]);

        $sorted_songs = $song_select_attr->orderBy('view_count', 'desc');

        $artists = Artist::where('fullname', 'like', '%'.$query.'%')->selectRaw('id, null as album_id, fullname as name, null as view_count, profile_pic');

        $results = $sorted_songs->union($artists)->paginate(10)->withQueryString(['q'=>$query]);

        return view('pages.searchResult', compact('results'));
    }

    public function displayAll(){
        $query = Song::select(['id', 'album_id', 'title', 'view_count'])
        ->with(['album' => function($query){
            $query->select(['id', 'release_date', 'artist_id'])->with([
                'artist' => function($query){
                    $query->select([ 'id', 'fullname']);
                }
            ]);
        }]);

        $songs = $query->paginate(10);

        return view('admin.home_admin', compact('songs'));
    }

    public function show($id){
        $song = Song::where('id', $id)->with('album.artist')->get();
        return response()->json($song);
    }
}
