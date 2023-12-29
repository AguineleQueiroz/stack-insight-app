<?php

use App\Http\Controllers\ProfileController;
use App\Services\Enums\SupportStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{SiteController};
use App\Http\Controllers\Admin\{SupportController, ReplySupportController};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /* application */
    Route::get('/supports/{id}/replies',[ReplySupportController::class, 'replies'])->name('replies.replies');

    Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
    Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
    Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
    Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
    Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
    Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
    Route::get('/findSupport/{id}', [SupportController::class, 'findSupport']);
});

require __DIR__.'/auth.php';
