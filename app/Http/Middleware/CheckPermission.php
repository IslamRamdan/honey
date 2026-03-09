<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!$request->user()) {
            abort(403);
        }

        // Super-admin bypasses all permission checks
        if ($request->user()->hasRole('super-admin')) {
            return $next($request);
        }

        if (!$request->user()->hasPermissionTo($permission)) {
            abort(403, __('admin.no_permission'));
        }

        return $next($request);
    }
}
