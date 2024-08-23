<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();
        $user = User::updateOrCreate([
            'provider_id' => $providerUser->id,
            'provider' => $provider,
        ], [
            'first_name' => $providerUser->name,
            'email' => $providerUser->email,
            'email_verified_at' => now(),
            'provider_token' => $providerUser->token,
            'gender' => 'other',
        ]);
        $user->update([
            'last_login_at' => now(),
        ]);
        Auth::login($user);

        return redirect('/dashboard');
    }
}
