<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogsController;

Route::middleware("auth")->group(
    function () {
        Route::post('/logs', [LogsController::class, 'create_log']);
    }
);
