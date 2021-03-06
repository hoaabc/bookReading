<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkjwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!auth()->check()) {
            return response(['message' => "unauthorize" ], 403 );
        }
        return $next($request);
    }
}
