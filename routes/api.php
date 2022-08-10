<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Api\V1\PostController;

/**
 * APi V1
 */
Route::prefix('v1')->group(function () {
    Route::apiResource('posts', PostController::class)
        ->only(['index', 'show', 'destroy']);

    Route::delete('hard-posts-delete/{id}', [PostController::class, 'hardDestroy']);
});
