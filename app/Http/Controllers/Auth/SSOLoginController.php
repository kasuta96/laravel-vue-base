<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class SSOLoginController extends Controller
{
    /**
     * Redirect user to OAuth provider
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Redirect user to OAuth provider
     */
    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();

        # Check email
        $currentUser = User::query()
            ->where('email', $user->getEmail())
            ->whereNot('provider', $provider)
            ->first();
        if ($currentUser) {
            return Inertia::render('Auth/Login', [
                'error' => "This user use $currentUser->provider login method!",
            ]);
        }

        /** @var User $user */
        $user = User::updateOrCreate([
            'provider' => $provider,
            'provider_id' => $user->id,
        ], [
            'name' => $user->name ?? $user->nickname,
            'email' => $user->email,
            'provider_token' => $user->token,
            'provider_refresh_token' => $user->name,
            'avatar' => $user->name,
        ]);

        # Verify email on first time
        !$user->hasVerifiedEmail() && $user->markEmailAsVerified();

        Auth::login($user);

        return redirect('/dashboard');
    }
}
