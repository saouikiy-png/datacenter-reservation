<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && Auth::user()->role_id === 3) {
            return $next($request);
        }

        abort(403, 'Accès refusé');
    }
}
