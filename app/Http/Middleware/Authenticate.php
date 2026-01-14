<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{
  public function handle($request, Closure $next)
  {
    // ici tu peux mettre un check simple si l'utilisateur est connecté
    return $next($request);
  }
}
