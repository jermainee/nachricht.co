<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::post('/message/create.json', [MessageController::class, 'create']);
//Route::get('/message/{id}/read.json', 'MessageController@read');
