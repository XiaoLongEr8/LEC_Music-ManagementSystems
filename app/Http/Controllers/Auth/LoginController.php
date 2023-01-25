<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function redirectLogin(){
        if(Auth::check()){
            return redirect('/');
        }

        $cookieValues = Cookie::has('loginCookie')?json_decode(Cookie::get('loginCookie'), true):[];

        return view('pages.login')->with('loginCookie', $cookieValues);
    }

    public function store(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            $validator = Validator::make([], []); // Empty data and rules fields
            $validator->errors()->add('email', 'The email or password is incorrect');
            return redirect()->back()->withErrors($validator);
        }

        if($request->remember){
            $minutes = 300;
            $values = [
                'email' => $request->email,
                'name' => $request->name
            ];

            $cookie = cookie('loginCookie', json_encode($values), $minutes);

            return redirect('/')->withCookie($cookie);
        }

        return redirect('/');
    }

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $google_user = Socialite::driver('google')->stateless()->user();

        $user = User::where('google_id', $google_user->id)->first();

        if ($user) {
            $user->update([
                'google_token' => $google_user->token,
                'google_refresh_token' => $google_user->refreshToken,
            ]);
        }
        else if(User::where('email', $google_user->email)->first()) {
            $user = User::where('email', $google_user->email)->first();
            $user->update([
                'google_id' => $google_user->id,
                'google_token' => $google_user->token,
                'google_refresh_token' => $google_user->refreshToken
            ]);
        }
        else{
            $user = User::create([
                'fullname' => $google_user->name,
                'username' => strstr($google_user->email, '@', true),
                'email' => $google_user->email,
                'google_id' => $google_user->id,
                'google_token' => $google_user->token,
                'google_refresh_token' => $google_user->refreshToken,
                'profile_pic' => $google_user->getAvatar(),
                'role' => 1
            ]);
        }

        Auth::login($user);

        return redirect()->intended();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
