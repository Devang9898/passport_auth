<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LinkedInController extends Controller
{
    /**
     * Redirect to LinkedIn for authentication.
     */
    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Handle LinkedIn callback.
     */
    public function handleLinkedInCallback()
    {
        try {
            // Get user info from LinkedIn
            $linkedInUser = Socialite::driver('linkedin')->user();

            // Check if the user already exists
            $existingUser = User::where('linkedin_id', $linkedInUser->id)->first();

            if ($existingUser) {
                // Log in the existing user
                Auth::login($existingUser);
            } else {
                // Create a new user
                $newUser = User::create([
                    'name' => $linkedInUser->name,
                    'email' => $linkedInUser->email,
                    'linkedin_id' => $linkedInUser->id,
                    'avatar' => $linkedInUser->avatar,
                    'password' => bcrypt('password123'), // Set a default password
                ]);

                Auth::login($newUser);
            }

            return redirect('/home')->with('success', 'Logged in with LinkedIn!');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
