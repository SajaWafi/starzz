<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;

Route::middleware(['auth', 'can:admin-only'])->group(function () {
    Route::resource('authors', AuthorController::class);
    Route::resource('categories', CategoryController::class);

    });

