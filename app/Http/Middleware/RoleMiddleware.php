<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
         // Check if the user is authenticated
         if (!Auth::check()) {
            return redirect('login');
        }

        // Check if the user has the required role
        $user = Auth::user();
        if ($user->role !== $role) {
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
