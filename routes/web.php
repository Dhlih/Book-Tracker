<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;

Route::get('/', function () {
    return Auth::check() ? redirect("/books/index") : redirect("/login");
});

# guest route

# auth route


require __DIR__ . '/auth.php';
require __DIR__ . '/logs.php';
require __DIR__ . '/books.php';
