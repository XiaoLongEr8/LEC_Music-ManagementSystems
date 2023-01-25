<?php

namespace App\Http\Controllers;

use App\Models\EditSongRequest;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongEditReqController extends Controller
{
    public function create(Request $request){
        $song = Song::where('id', $request->id)->first();

        if(!Auth::check()){
            return redirect('/login');
        }

        if(!$song){
            return back();
        }

        $request->validate([
            'body' => ['required', 'string', 'min:20', 'max:100000'],
        ]);

        $form = EditSongRequest::create([
            'user_id' => Auth::id(),
            'song_id' => $request->id,
            'body' => $request->body,
            'status' => 0
        ]);

        return redirect('/');
    }

    public function redirectForm($id){
        $song = Song::where('id', $id)->select(['id', 'title'])->first();
        if(!$song){
            return back();
        }

        return view('pages.requestSong', compact('song'));
    }
}
