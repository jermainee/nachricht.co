<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
	public function update(Request $request, string $locale) {
		App::setLocale($locale);
		session()->put('locale', $locale);

		$referer = $request->headers->get('referer');
		if (!empty($referer) && !in_array($referer, MessageController::ALLOWED_REFERERS)) {
			return redirect()->to('/');
		}

		return redirect()->back();
    }
}
