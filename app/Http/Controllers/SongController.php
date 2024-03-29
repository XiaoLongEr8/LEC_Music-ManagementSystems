<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
        $song = Song::where('id', $id)->with(['album' => function($query){
            $query->select(['id', 'release_date', 'cover_image', 'artist_id'])->with([
                'artist' => function($query){
                    $query->select([ 'id', 'fullname']);
                }
            ]);
        }])->first();

        $like_cookie = 'song_'.$song->id.'_liked';
        $dislike_cookie = 'song_'.$song->id.'_disliked';
        if(Cookie::has($like_cookie)){
            $song->like = true;
        }
        else if(Cookie::has($dislike_cookie)){
            $song->dislike = true;
        }

        return view('pages.songDetail', compact('song'));
    }

    public function redirectCreate(){
        $genres = Genre::select(['id', 'name'])->get();
        $albums = Album::select(['id', 'artist_id', 'title'])->with([
            'artist' => function($query){
                $query->select([ 'id', 'fullname']);
            }
        ])->get();

        return view('admin.admin_add_song', compact('genres', 'albums'));
    }

    public function create(Request $request){
        $request->validate([
            'genres' => ['required', 'array'],
            'album_id' => ['required', 'exists:albums,id'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:1000'],
            'lyrics' => ['required', 'string', 'min:10', 'max:7000'],
            'view_count' => ['required', 'numeric', 'min:0']
        ]);

        $genres = $request->get('genres');
        foreach ($genres as $genre) {
            $exists = Genre::where('id', $genre)->exists();
            if (!$exists) {
                return back();
            }
        }

        $song = Song::create([
            'album_id' => $request->album_id,
            'title' => $request->title,
            'description'=> $request->description,
            'lyrics' => $request->lyrics,
            'view_count' => $request->view_count
        ]);

        $song->genres()->attach($genres);

        return redirect()->route('admin.songs');
    }

    public function redirectEdit($id){
        $song = Song::where('id', $id)->with('album', 'genres')->first();

        if(!$song){
            return back();
        }

        $genres = Genre::select(['id', 'name'])->get();
        $albums = Album::select(['id', 'artist_id', 'title'])->with([
            'artist' => function($query){
                $query->select([ 'id', 'fullname']);
            }
        ])->get();

        return view('admin.admin_edit_song', compact('genres', 'albums', 'song'));
    }

    public function edit(Request $request){
        $song = Song::where('id', $request->id)->first();
        if(!$song){
            return back();
        }

        $request->validate([
            'genres' => ['required', 'array'],
            'album_id' => ['required', 'exists:albums,id'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:1000'],
            'lyrics' => ['required', 'string', 'min:10', 'max:7000'],
            'view_count' => ['required', 'numeric']
        ]);

        $genres = $request->get('genres');
        foreach ($genres as $genre) {
            $exists = Genre::where('id', $genre)->exists();
            if (!$exists) {
                return back();
            }
        }

        $song->update([
            'album_id' => $request->album_id,
            'title' => $request->title,
            'description' => $request->description,
            'lyrics' => $request->lyrics,
            'view_count' => $request->view_count
        ]);

        $song->genres()->detach();
        $song->genres()->attach($genres);

        return redirect()->route('admin.songs');
    }

    public function destroy($id){
        $song = Song::where('id', $id)->first();
        if(!$song){
            return back();
        }

        $song->delete();
        return back();
    }

    public function updateLike(Request $request){
        $song_id = $request->id;

        $song = Song::where('id', $song_id)->first();

        if(!$song){
            return back();
        }

        $is_like = $request->like;
        $is_dislike = $request->dislike;

        $like_cookie = 'song_'.$song_id.'_liked';
        $dislike_cookie = 'song_'.$song_id.'_disliked';

        if($is_like){
            if(Cookie::has($dislike_cookie)){
                Cookie::queue(Cookie::forget($dislike_cookie));
            }
            if(!Cookie::has($like_cookie)){
                Cookie::queue(Cookie::make($like_cookie, true, 500));
            }
        }
        elseif($is_dislike) {
            if(Cookie::has($like_cookie)){
                Cookie::queue(Cookie::forget($like_cookie));
            }
            if(!Cookie::has($dislike_cookie)){
                Cookie::queue(Cookie::make($dislike_cookie, true, 500));
            }
        }

        return back();
    }
}
