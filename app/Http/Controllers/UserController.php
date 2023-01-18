<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function editPic(Request $request){

        if(Auth::check()){
            return back();
        }

        $user = auth()->user();

        $request->validate([
            'profile_pic' => ['required', 'image', 'max:5000']
        ]);

        $user_path = storage_path('app/user/'.$user->profile_pic);
        if (file_exists($user_path)) {
            unlink($user_path);
        }

        $path = $request->file('profile_pic');
        $path_name = uniqid() . $request->username . '.' . $path->getClientOriginalExtension();
        Storage::putFileAs('user', $path, $path_name);

        $user->update([
            'profile_pic' => $path_name
        ]);

        return response()->json($user);
    }

    public function edit(Request $request){
        if(Auth::check()){
            return back();
        }

        $user = auth()->user();

        $request->validate([
            'fullname' => ['required'],
            'username' => ['required'],
            'phone_num' => ['required', 'string', 'regex:/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/'],
            'email' => ['required', 'string', 'email', 'unique:users,email']
        ]);

        $user->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'phone_num' => $request->phone_num,
            'email' => $request->email
        ]);

        return response()->json($user);
    }
}
