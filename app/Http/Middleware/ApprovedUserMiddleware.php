<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApprovedUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var ?App\Models\User 
         */
        $user = Auth::user();
        if (null !== $user && $user->is_banned && !$user->isAdmin()) {
            return redirect()->route('ban-page');
        }
        return $next($request);
    }
}
