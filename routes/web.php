<?php

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

Route::get('/faq', function () {
	return view('faq.faq');
});
