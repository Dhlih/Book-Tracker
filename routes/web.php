<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    Route::get('/books', function () {
        return view('books.books');
    });
    Route::get('/books/read', function () {
        return view('books.books-read');
    });
    Route::get('/books/reading', function () {
        return view('books.books-reading');
    });
    Route::get('/books/read', function () {
        return view('books.books-read');
    });

    Route::get('/books', function () {
        return view('books.books');
    });

    Route::post('/logout', [AuthController::class, "logout"]);
});
