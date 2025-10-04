<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/login");
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', action: function () {
    return view('dashboard');
});

