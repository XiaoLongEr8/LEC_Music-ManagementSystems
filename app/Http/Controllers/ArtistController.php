<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    public function displayAll(){
        $artists = Artist::select(['id', 'fullname', 'nationality'])->paginate(10);
        return view('admin.artist_admin', compact('artists'));
    }

    public function show($id){
        $artist = Artist::where('id', $id)->with(['albums' => function($query){
            $query->select(['id', 'artist_id', 'album_type_id', 'title', 'cover_image','release_date'])->with('album_type');
        }])->first();

        return view('pages.artistDetail', compact('artist'));
    }

    public function redirectCreate(){
        return view('admin.admin_add_artist');
    }

    public function create(Request $request){
        $request->validate([
            'fullname' => ['required', 'string', 'max:50'],
            'profile_pic' => ['required', 'image', 'max:5000'],
            'bio' => ['required', 'string', 'max:1000'],
            'nationality' => ['required', 'string', 'max:100']
        ]);

        $path = $request->file('profile_pic');
        $path_name = uniqid() . $request->fullname . '.' . $path->getClientOriginalExtension();
        Storage::putFileAs('artist', $path, $path_name);

        Artist::create([
            'fullname' => $request->fullname,
            'profile_pic' => 'artist/' . $path_name,
            'bio' => $request->bio,
            'nationality' => $request->nationality
        ]);

        return redirect()->route('admin.artists');
    }

    public function destroy($id){
        $artist = Artist::where('id', $id)->first();
        if(!$artist){
            return back();
        }

        $artist->delete();
        return back();
    }

    public function redirectEdit($id){
        $artist = Artist::where('id', $id)->first();
        if(!$artist){
            return back();
        }

        return view('admin.admin_edit_artist', compact('artist'));
    }

    public function edit(Request $request){
        $artist = Artist::where('id', $request->id)->first();
        if(!$artist){
            return back();
        }

        $request->validate([
            'fullname' => ['required', 'string', 'max:50'],
            'profile_pic' => ['nullable', 'image', 'max:5000'],
            'bio' => ['required', 'string', 'max:1000'],
            'nationality' => ['required', 'string', 'max:100']
        ]);

        $path = $request->file('profile_pic');

        if($path){
            $artist_path = storage_path('app/'.$artist->profile_pic);
            if (file_exists($artist_path)) {
                unlink($artist_path);
            }


            $path_name = uniqid() . $request->fullname . '.' . $path->getClientOriginalExtension();
            Storage::putFileAs('artist', $path, $path_name);

            $artist->update([
                'fullname' => $request->fullname,
                'profile_pic' => 'artist/' . $path_name,
                'bio' => $request->bio,
                'nationality' => $request->nationality
            ]);
        }
        else{
            $artist->update([
                'fullname' => $request->fullname,
                'bio' => $request->bio,
                'nationality' => $request->nationality
            ]);
        }

        return redirect()->route('admin.artists');
    }
}
