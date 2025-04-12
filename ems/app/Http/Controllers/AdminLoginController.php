<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrator;

class AdminLoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('adminlogin');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();

            // Redirect to the admin dashboard after successful login
            return redirect()->route('hrdashboard');
        }

        // If credentials do not match, return with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Logout the admin
        Auth::guard('admin')->logout();

        // Invalidate the session to prevent session hijacking
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the login page after logout
        return redirect()->route('login');
    }
}
