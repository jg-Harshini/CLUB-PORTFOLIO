<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
public function showLoginForm()
{
    return view('login');
}

// Override default login route redirect
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

        Auth::logout(); // unknown role
    }

    return back()->withErrors(['email' => 'Invalid credentials.']);
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect to login page correctly
    return redirect()->route('login.form');
}

}
