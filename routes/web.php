<?php

Route::get('/', function () {
    return view('frontPage.frontPage');
});

Route::get('/faq', function () {
	return view('faq.faq');
});
