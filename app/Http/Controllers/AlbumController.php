<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumType;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function displayAll(){
        $albums = Album::with('album_types')->get();

        return response()->json($albums);
    }

    public function  redirectCreate(){
        $artists = Artist::select(['id', 'fullname'])->get();
        $types = AlbumType::select(['id', 'name'])->get();

        return view('admin.admin_add_album', compact('artists', 'types'));
    }

    public function create(Request $request){
        $request->validate([
            'artist_id' => ['required', 'exists:artists,id'],
            'album_type_id' => ['required', 'exists:album_types,id'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:1000'],
            'contributors' => ['required', 'string', 'min:10', 'max:1000'],
            'release_date' => ['required', 'date'],
            'cover_image' => ['required', 'image', 'max:5000']
        ]);

        $path = $request->file('cover_image');
        $path_name = uniqid() . $request->title . '.' . $path->getClientOriginalExtension();
        Storage::putFileAs('album', $path, $path_name);

        Album::create([
            'artist_id' => $request->artist_id,
            'album_type_id' => $request->album_type_id,
            'title' => $request->title,
            'description' => $request->description,
            'contributors' => $request->contributors,
            'release_date' => $request->release_date,
            'cover_image' => 'album/' . $path_name
        ]);

        return redirect()->route('admin.songs');
    }
}
