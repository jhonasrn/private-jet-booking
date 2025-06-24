<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handles an incoming request and ensures the user has the required role(s).
     *
     * Usage:
     * - For a single role:    ->middleware('role:admin')
     * - For multiple roles:   ->middleware('role:admin,pilot')
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $user = $request->user();

        $allowedRoles = explode(',', $roles);

        if (! $user || ! in_array($user->role, $allowedRoles)) {
            abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
