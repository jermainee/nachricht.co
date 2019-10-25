<?php

use Illuminate\Support\Facades\Route;

Route::get('lang/{locale}', 'LanguageController@update');

Route::get('/', function () {
    return view('frontPage.frontPage');
});
Route::get('/{uid}_{key}', function ($uid, $key) {
	session([
		'uid' => $uid,
		'key' => $key,
	]);

	return redirect('/n');
});
Route::get('/n', 'MessageController@read');

Route::get('/datenschutz', function () {
	return view('legalPages.privacy');
});
Route::get('/impressum', function () {
	return view('legalPages.imprint');
});

Route::get('/faq', function () {
	return view('faq.faq');
});
