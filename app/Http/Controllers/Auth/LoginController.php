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
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ✅ Consistent redirect to login.form
        return redirect()->route('login.form');
    }
}
