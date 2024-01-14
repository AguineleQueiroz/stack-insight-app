<?php

use App\Http\Controllers\Api\Auth\AuthApiController;
use App\Http\Controllers\Api\ReplySupportApiController;
use App\Http\Controllers\Api\SupportApiController;
use Illuminate\Support\Facades\Route;

Route::post('/v1/auth', [AuthApiController::class, 'auth']);

Route::middleware(['auth:sanctum'])->group(function () {

    /*intern auth routes*/
    Route::post('/v1/logout', [AuthApiController::class, 'logout']);
    Route::get('/v1/logged_user', [AuthApiController::class, 'loggedUser']);
    /*replies routes*/
    Route::post('v1/replies/{support_id}', [ReplySupportApiController::class, 'store']);
    Route::get('v1/replies/{support_id}', [ReplySupportApiController::class, 'replies']);
    Route::delete('v1/replies/{id}', [ReplySupportApiController::class, 'destroy']);
    /*support routes*/
    Route::apiResource('/v1/supports', SupportApiController::class);
});
