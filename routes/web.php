<?php

use Illuminate\Support\Facades\Route;

// locale
Route::get('lang/{locale}', 'LanguageController@update');

// message
Route::get('/', function () {
    return view('frontPage.frontPage');
});
Route::get('/{uid}_{key}','MessageController@open');
Route::get('/n', 'MessageController@read');
Route::post('/n', 'MessageController@read');

// pages
Route::get('/faq', function () {
	return view('faq.faq');
});

// legal pages
Route::get('/datenschutz', function () {
	return view('legalPages.privacy');
});
Route::get('/impressum', function () {
	return view('legalPages.imprint');
});
