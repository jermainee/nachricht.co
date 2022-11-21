<?php

namespace App\Http\Util;

class CookieConsentUtil {
	public static function isAgreed(): bool
	{
        //return session()->get('cookieConsent') === true;

        return true;
	}
}
