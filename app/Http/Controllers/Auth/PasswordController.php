<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validate = [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ];
        $user = auth()->user();
        if ($user->password) {
            $validate['current_password'] = ['required', 'current_password'];
        }

        $validated = $request->validate($validate);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back();
    }
}
