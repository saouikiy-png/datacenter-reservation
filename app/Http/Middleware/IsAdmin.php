<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class IsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
           
            abort(403, 'Accès refusé');
        }

        $role = Auth::user()->role->name;

        if ($role !== 'admin') {
           
            abort(403, 'Accès refusé');
        }

        return $next($request);
    }
}

