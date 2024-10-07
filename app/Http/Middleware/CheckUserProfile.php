<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckUserProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the ID from the route
        $id = $request->route('id');

        // Check if the authenticated user's ID matches the provided ID
        if ($user->id != $id) {
            // Optionally, you can redirect to a 403 page or any other page
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
