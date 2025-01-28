<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Dummy logic to simulate login success/failure
        if ($request->email === 'test@example.com' && $request->password === 'password') {
            return redirect()->route('dashboard'); // Redirect to a dashboard route
        }

        // If login fails
        return back()->with('error', 'Invalid credentials')->withInput();
    }
}
