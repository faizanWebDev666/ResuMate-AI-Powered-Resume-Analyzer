<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
     public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'password' => bcrypt(Str::random(16)),
            ]
        );

        Auth::login($user);

        return redirect('/'); // Change to your dashboard/home
    }
}
