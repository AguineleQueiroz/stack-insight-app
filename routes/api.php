<?php

use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;

Route::post('/v1/auth', [AuthApiController::class, 'auth']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/v1/logout', [AuthApiController::class, 'logout']);
    Route::get('/v1/logged_user', [AuthApiController::class, 'loggedUser']);

    Route::apiResource('/v1/supports', SupportController::class);
});
