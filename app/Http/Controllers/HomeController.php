<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $latest = Song::latest()->with('album.artist')->take(4)->get();
        foreach($latest as $song){
            $song->time_ago = $song->created_at->diffForHumans();
        }

        $top = Song::orderBy('view_count', 'desc')->with('album.artist')->take(3)->get();

        $songs = [
            'latest' => $latest,
            'top' => $top
        ];

        return view('pages.home', $songs);
    }
}
