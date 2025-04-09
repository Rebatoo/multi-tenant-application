<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;

class TenantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Get the subdomain from the host
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0];
        
        // Find tenant by subdomain
        $tenant = Tenant::where('domain', $subdomain)
            ->where('status', 'approved')
            ->first();

        if (!$tenant) {
            return redirect('/')->with('error', 'Tenant not found or not approved');
        }

        // Set tenant in the request for later use
        $request->tenant = $tenant;

        return $next($request);
    }
} 