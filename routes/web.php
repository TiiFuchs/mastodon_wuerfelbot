<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/callback', function () {
    //
})->name('auth.callback');

Route::any('/mastodon/callback', function (Request $request) {
    ray($request);
    ray(file_get_contents('php://input'));
})->name('mastodon.callback');
