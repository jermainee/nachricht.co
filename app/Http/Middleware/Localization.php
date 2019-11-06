<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Localization
{
	private const ACCEPTED_LANGUAGES = [
		'de',
		'en',
		'ru',
	];

    public function handle($request, Closure $next)
    {
	    if (session()->has('locale')) {
		    App::setLocale(session()->get('locale'));

		    return $next($request);
	    }

	    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		    $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		    if (in_array($browserLang, self::ACCEPTED_LANGUAGES)) {
			    App::setLocale($browserLang);

			    return $next($request);
		    }
	    }

	    return $next($request);
    }
}
