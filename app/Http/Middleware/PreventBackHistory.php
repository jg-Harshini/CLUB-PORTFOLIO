<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PreventBackHistory
{
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated and session is valid
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Please login to continue.');
        }

        $response = $next($request);
        
        // Skip header modification for file downloads and streamed responses
        if ($response instanceof BinaryFileResponse || $response instanceof StreamedResponse) {
            return $response;
        }
        
        // Only add cache prevention headers to regular HTTP responses that support headers
        if (method_exists($response, 'header') && !$response->headers->has('Content-Disposition')) {
            $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate, private')
                     ->header('Pragma', 'no-cache')
                     ->header('Expires', 'Thu, 01 Jan 1970 00:00:00 GMT')
                     ->header('Last-Modified', gmdate('D, d M Y H:i:s') . ' GMT')
                     ->header('X-Frame-Options', 'DENY')
                     ->header('X-Content-Type-Options', 'nosniff')
                     ->header('Referrer-Policy', 'no-referrer')
                     ->header('X-XSS-Protection', '1; mode=block');
        }
        
        return $response;
    }
}
