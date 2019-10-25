<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
	public function update(string $locale) {
		App::setLocale($locale);
		session()->put('locale', $locale);

		return redirect()->back();
    }
}
