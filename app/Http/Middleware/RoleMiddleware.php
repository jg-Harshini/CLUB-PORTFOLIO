<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // If not logged in, redirect to login with error message
        if (!Auth::check()) {
            return redirect()->route('login.form')
                             ->with('error', 'Please login to continue.');
        }

        $user = Auth::user();

        // If logged in but wrong role, redirect with error
        if (!in_array($user->role, $roles)) {
            return redirect()->route('login.form')
                             ->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
