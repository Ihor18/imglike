<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = User::where('email', $user->email)->first();
        $existingName = User::where('name', $user->name)->first();
        if($existingUser){
            auth()->login($existingUser, true);
        } else {
            $newUser                  = new User;
            $newUser->name            = $existingName?'player-'.substr(md5($user->email),0,10):$user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->route('index');
    }
}
