<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'fullname' => ['required', 'string'],
            'username' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone_num' => ['required', 'string', 'regex:/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'phone_num' => $request->phone_num,
            'password' => Hash::make($request->password)
        ]);

        // event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }
}
