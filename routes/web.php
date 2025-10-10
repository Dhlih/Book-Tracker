<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return Auth::check() ? redirect("/books") : redirect("/login");
});

# guest route
Route::middleware("guest")->group(
    function () {
        # get method
        Route::get('/login', [AuthController::class, "show_login"])->name("login");
        Route::get('/register', [AuthController::class, "show_register"]);

        # post method
        Route::post('/login', [AuthController::class, "login"]);
        Route::post('/register', [AuthController::class, "register"]);
    }
);

# auth route
Route::middleware("auth")->group(function () {
    Route::get('/books/index', [BooksController::class, "show_books"]);

    Route::get('/books/{type}/search', [BooksController::class, "search"]);

    Route::get('/books/read', [BooksController::class, "show_books_read"]);

    Route::get('/books/reading', [BooksController::class, "show_books_reading"]);

    Route::get('/books/read', [BooksController::class, "show_books_read"]);

    Route::get('/books/create', [BooksController::class, "show_books_create"]);

    Route::post('/books', [BooksController::class, "add_book"]);


    Route::post('/logout', [AuthController::class, "logout"]);
});
