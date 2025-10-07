<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect("/login");
});


# Authentication route
Route::get('/login', [AuthController::class, "show_login"]);
Route::get('/register', [AuthController::class, "show_register"]);

Route::post('/login', [AuthController::class, "login"]);
Route::post('/register', [AuthController::class, "register"]);


# Books route
Route::get('/books/read', function () {
    return view('books.books-read');
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
