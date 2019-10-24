<?php

use Illuminate\Support\Facades\Route;

Route::post('/message/create.json', 'MessageController@create');
//Route::get('/message/{id}/read.json', 'MessageController@read');
