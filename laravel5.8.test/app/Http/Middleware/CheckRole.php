<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::user()->hasRole($role)) {
            abort(403, 'Ошибка доступа!');
        }
        
        return $next($request);
    }
}
