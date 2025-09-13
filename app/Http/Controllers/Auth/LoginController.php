<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // ✅ Fixed
        return view('login');
    }

    // Not actually used because you’re overriding redirects manually
    public function redirectTo()
    {
        return '/tce/login';
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'super_admin') {
                return redirect()->route('superadmin.dashboard');
            }
            if ($user->role === 'club_admin') {
                return redirect()->route('clubadmin.dashboard');
            }
            if ($user->role === 'hod') {
                return redirect()->route('hod.dashboard');
            }

            // Logout if role not recognized
            Auth::logout();
            return redirect()->route('login.form')->withErrors([
                'email' => 'Unauthorized role: ' . $user->role,
            ]);
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        // Completely clear session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        
        // Create response with cache-busting headers
        $response = redirect()->route('login.form')
            ->with('message', 'You have been successfully logged out.');
            
        // Add headers to prevent caching of this response
        return $response
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Thu, 01 Jan 1970 00:00:00 GMT');
    }
}
