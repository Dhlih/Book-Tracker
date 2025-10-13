<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware("guest")->group(
    function () {
        # get method
        Route::get('/login', [AuthController::class, "show_login"])->name("login");
        Route::get('/register', [AuthController::class, "show_register"]);

        # post method
        Route::post('/login', [AuthController::class, "login"]);
        Route::post('/register', [AuthController::class, "register"]);
        Route::post('/logout', [AuthController::class, "logout"]);
    }
);
