<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
<<<<<<< HEAD
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->hasRole('employee')) {
            abort(403, 'Unauthorized. Employees only.');
        }

        return $next($request);
    }
}
=======
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || ! $request->user()->hasRole('employee')) {
            abort(403, 'Deny access if unauthorized');
        }
        return $next($request);
    }
}
>>>>>>> 887e8b834b4f19bb55c18a98dc1ee18e35609f9a
