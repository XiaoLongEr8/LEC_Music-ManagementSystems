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
            'subject' => ['required', 'string', 'min:3', 'max:100'],
            'body' => ['required', 'string', 'min:20', 'max:100000'],
        ]);

        $form = EditArtistRequest::create([
            'user_id' => Auth::id(),
            'artist_id' => $request->id,
            'subject' => $request->subject,
            'body' => $request->body,
            'status' => 0
        ]);

        return response()->json($form);
    }
}
