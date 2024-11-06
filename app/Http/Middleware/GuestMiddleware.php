<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return match (Session::get("peran"))
        {
            "admin" => redirect()->route("dashboard-admin"),
            "admin-manager" => redirect()->route("dashboard-admin-manager"),
            default => $next($request)
        };
    }
}
