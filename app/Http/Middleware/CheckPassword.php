<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next)
    {
        if( $request->api_password !== env('API_PASSWORD','ase1iXcLAxanvXLZcgh6tk')){
            return response()->json(['message' => 'Unauthenticated.']);
        }
        return $next($request);
    }
}
