<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

Route::middleware("auth")->group(function () {
    Route::get('/books/index', [BooksController::class, "show_books_index"]);

    Route::get('/books/finished', [BooksController::class, "show_books_finished"]);

    Route::get('/books/reading', [BooksController::class, "show_books_reading"]);

    Route::get('/books/read', [BooksController::class, "show_books_read"]);

    Route::get('/books/update/{id}', [BooksController::class, "show_update_book"]);

    Route::get('/books/add', [BooksController::class, "show_add_book"]);

    Route::put('/books/update/{id}', [BooksController::class, "update_status"]);

    Route::post('/books/add', [BooksController::class, "add_book"]);

    Route::get('/books/{type}/search', [BooksController::class, "search"]);

    Route::get('/books/search/google', [BooksController::class, "search_google_books"]);
});
