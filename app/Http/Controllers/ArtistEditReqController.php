<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\EditArtistRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistEditReqController extends Controller
{
    public function create(Request $request){
        $artist = Artist::where('id', $request->id)->first();

        if(!Auth::check()){
            return redirect('/login');
        }

        if(!$artist){
            return back();
        }

        $request->validate([
            'body' => ['required', 'string', 'min:20', 'max:100000'],
        ]);

        $form = EditArtistRequest::create([
            'user_id' => Auth::id(),
            'artist_id' => $request->id,
            'body' => $request->body,
            'status' => 0
        ]);

        return redirect('/');
    }

    public function redirectForm($id){
        $artist = Artist::where('id', $id)->select(['id', 'fullname'])->first();
        if(!$artist){
            return back();
        }

        return view('pages.requestSong', compact('artist'));
    }
}
