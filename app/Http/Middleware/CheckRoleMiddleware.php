<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        // dd($roles);
        if($request->user() == null){

            return response('Insufficient permission', 401);
        }
        $actions = $request->route()->getAction();
        $roles = explode('|', $roles);
        // dd($roles);

        if($request->user()->hasAnyRole($roles) || !$roles){
            return $next($request);
        }

        return response('Insufficient permission', 401);
    }
}
