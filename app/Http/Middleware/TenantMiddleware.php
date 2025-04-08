<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Extract tenant identifier from domain (e.g., tenant1.example.com)
        $domain = explode('.', $request->getHost())[0];
        
        // Find the tenant in the database by the domain/subdomain
        $tenant = Tenant::where('domain', $domain)->first();

        if (!$tenant) {
            abort(404, 'Tenant not found.');
        }

        // Configure the tenant database connection
        Config::set('database.connections.tenant.database', $tenant->database);
        Config::set('database.connections.tenant.username', $tenant->username);
        Config::set('database.connections.tenant.password', $tenant->password);
        
        // Reconnect to the tenant database
        DB::purge('tenant');
        DB::reconnect('tenant');
        
        // Set the default connection to tenant
        Config::set('database.default', 'tenant');

        // Store the tenant information for use later
        session(['tenant' => $tenant]);

        // Proceed with the request
        return $next($request);
    }
}
