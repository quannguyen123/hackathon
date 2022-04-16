<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $role, $guard = null)
    {
        $authGuard = Auth::guard($guard);
        if ($authGuard->guest()) {
            return redirect('/login');
        }
        $roles = is_array($role) ? $role : explode('|', $role);

        if (!in_array($authGuard->user()->role_id, $roles))
        {
            return abort(403);
        }
       
        return $next($request);
    }
}
