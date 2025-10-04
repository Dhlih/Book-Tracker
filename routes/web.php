<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/login");
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/books', function () {
    return view('books.books');
});

Route::get('/books/reading', function () {
    return view('books.books-reading');
});

Route::get('/books/read', function () {
    return view('books.books-read');
});


