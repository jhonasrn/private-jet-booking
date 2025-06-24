<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Redirect authenticated users away from guest-only pages.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role;

                return match ($role) {
                    'admin' => redirect()->route('admin.dashboard'),
                    'pilot' => redirect()->route('pilot.dashboard'),
                    'client' => redirect()->route('client.dashboard'),
                    default => redirect('/'),
                };
            }
        }

        return $next($request);
    }
}
