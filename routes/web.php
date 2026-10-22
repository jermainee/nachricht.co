<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

// locale
Route::get('lang/{locale}', [LanguageController::class, 'update']);

// message
Route::get('/', function () {
    return view('frontPage.frontPage');
});
Route::get('/de', function () {
	App::setLocale('de');
	session()->put('locale', 'de');

	return redirect('/', 301);
});
Route::get('/en', function () {
	App::setLocale('en');
	session()->put('locale', 'en');

	return view('frontPage.frontPage');
});
Route::get('/nl', function () {
    App::setLocale('nl');
    session()->put('locale', 'nl');

    return view('frontPage.frontPage');
});
Route::get('/ru', function () {
	App::setLocale('ru');
	session()->put('locale', 'ru');

	return view('frontPage.frontPage');
});
Route::get('/{uid}_{key}', [MessageController::class, 'open']);
Route::get('/n', [MessageController::class, 'read']);
Route::post('/n', [MessageController::class, 'read']);

// pages
Route::get('/faq', function () {
	return view('faq.faq');
});
Route::get('/faq/aes', function () {
	return view('faq.subPages.aes');
});
Route::get('/faq/tls', function () {
	return view('faq.subPages.tls');
});
Route::get('/aes', function () {
	return redirect('/faq/aes', 301);
});
Route::get('/tls', function () {
	return redirect('/faq/tls', 301);
});

// legal pages
Route::get('/datenschutz', function () {
	return view('legalPages.privacy');
});
Route::get('/impressum', function () {
	return view('legalPages.imprint');
});
