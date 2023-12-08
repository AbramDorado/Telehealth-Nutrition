<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class ForceHttps
{
    public function handle($request, Closure $next)
    {
        Log::info('ForceHttps middleware is executing.');
        // Check if the request is not secure (not using HTTPS)
        if (!$request->secure()) {
            // Redirect to the HTTPS version of the URL
            $secureUrl = secure_url($request->path());
            Log::info('Redirecting to HTTPS. Generated Secure URL: ' . $secureUrl);
            return redirect()->secure($request->path());
        }

        // Continue with the request
        return $next($request);
    }
}
