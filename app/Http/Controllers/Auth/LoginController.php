<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8']
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response('', 401);
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
                'first_name' =>$google_user->user['given_name'],
                'last_name' => $google_user->user['family_name'],
                'email' => $google_user->email,
                'google_id' => $google_user->id,
                'google_token' => $google_user->token,
                'google_refresh_token' => $google_user->refreshToken,
                'profile_pic' => $google_user->getAvatar()

            ]);
        }

        Auth::login($user);

        return redirect('/');
    }
}
