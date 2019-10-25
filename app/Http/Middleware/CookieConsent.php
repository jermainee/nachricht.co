<?php

namespace App\Http\Middleware;

use Closure;

class CookieConsent
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
    	$cookie = $request->cookie('cookieConsent');

    	if ($cookie && $cookie === 'agree') {
    		session(['cookieConsent' => true]);
	    }

        return $next($request);
    }
}
