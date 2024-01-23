<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;

class TokenVerification
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

        $headerToken = $request->bearerToken();

        //Checking if request has bearer valid token
        if ($headerToken && ($headerToken == config('constants.AUTHENTICATION_TOKEN'))) {
            return $next($request);
        } else {
            throw new AuthenticationException();
        }

    }
}
