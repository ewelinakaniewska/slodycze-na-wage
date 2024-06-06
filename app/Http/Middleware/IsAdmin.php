<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if(\Auth::user()->role_id != 1)
        {
            abort(401, 'Brak uprawnień');
        }
        return $next($request);
        } else {
            return redirect()->route('login');
        }
        
    }
}
