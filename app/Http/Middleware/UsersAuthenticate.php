<?php

namespace App\Http\Middleware;

use Closure;

class UsersAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Illuminate\Support\Facades\Gate::allows('admin', auth()->user())) {
            return abort(403);
        }

        return $next($request);
    }
}
