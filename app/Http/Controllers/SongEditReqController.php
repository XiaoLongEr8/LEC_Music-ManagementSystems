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
            return redirect('login');
        }

        if(!$song){
            return back();
        }

        $request->validate([
            'subject' => ['required', 'string', 'min:3', 'max:100'],
            'body' => ['required', 'string', 'min:20', 'max:100000'],
        ]);

        $form = EditSongRequest::create([
            'user_id' => Auth::id(),
            'song_id' => $request->id,
            'subject' => $request->subject,
            'body' => $request->body,
            'status' => 0
        ]);

        return response()->json($form);
    }
}
