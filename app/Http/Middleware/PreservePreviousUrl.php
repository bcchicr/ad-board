<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class PreservePreviousUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::missing('_preserved_url')) {
            Session::flash('_preserved_url', Session::previousUrl());
        } else {
            Session::setPreviousUrl(Session::get('_preserved_url'));
            $request->headers->set('referer', Session::get('_preserved_url'));
        }
        return $next($request);
    }
}
