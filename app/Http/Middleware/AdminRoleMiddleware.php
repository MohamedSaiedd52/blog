<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRoleMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (! $user || ! $user->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
