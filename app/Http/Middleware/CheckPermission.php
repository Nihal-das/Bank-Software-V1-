<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        $user = Auth::user();

        if (!$user || !$user->role) {
            abort(403);
        }

        $hasPermission = $user->role
            ->permissions()
            ->where('route', $permission)
            ->exists();

        if (!$hasPermission) {
            abort(403, 'You do not have permission to access this resource.');
        }

        return $next($request);
    }
}
