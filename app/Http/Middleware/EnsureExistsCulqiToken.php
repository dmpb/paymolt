<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureExistsCulqiToken
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
        $user = $request->user();
        $public_key = $request->user()->settings['culqi_development']['public_key'];
        $private_key = $request->user()->settings['culqi_development']['private_key'];

        if ($user && !empty($public_key) && !empty($private_key)) {
            return $next($request);
        } else{
            return redirect('welcome');
        }
    }
}
