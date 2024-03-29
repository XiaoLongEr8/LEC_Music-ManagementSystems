<?php

namespace App\Http\Controllers;

use App\Models\CreateSongRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongCreateReqController extends Controller
{
    public function create(Request $request){
        if(!Auth::check()){
            return redirect('/login');
        }

        $request->validate([
            'body' => ['required', 'string', 'min:20', 'max:100000']
        ]);

        $form = CreateSongRequest::create([
            'user_id' => Auth::id(),
            'body' => $request->body,
            'status' => 0
        ]);

        return redirect('/');
    }

    public function displayAll(){
        $song_creates = CreateSongRequest::paginate(5);
        return response()->json($song_creates);
    }
}
