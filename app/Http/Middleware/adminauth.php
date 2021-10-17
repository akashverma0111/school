<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = session()->get('role1');
        if($role == "admin")
        return $next($request);
    }
}
