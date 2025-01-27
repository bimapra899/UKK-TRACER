<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class UserPasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'min:8', 'confirmed'],
            ]);

            // Update password
            $user = Auth::user();
            $user->password = Hash::make($validated['password']);
            $user->save();

            return back()->with('status', 'password-updated');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update password. ' . $e->getMessage()]);
        }
    }
}