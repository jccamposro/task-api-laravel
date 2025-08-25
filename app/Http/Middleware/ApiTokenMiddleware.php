<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    $token = $request->bearerToken(); // <-- Laravel ya extrae el token sin "Bearer"

    if ($token !== env('API_TOKEN')) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $next($request);
}

}
