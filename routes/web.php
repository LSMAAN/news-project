<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsItemContoller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsItemContoller::class, 'index']);
