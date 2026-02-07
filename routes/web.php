<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;


// PENTING: Semua route harus di dalam grup 'web' agar Session & Bahasa berfungsi
Route::middleware(['web'])->group(function () {

    // 1. Home
    Route::get('/', [PublicController::class, 'index'])->name('home');

    // 2. Ganti Bahasa
    Route::get('lang/{locale}', [PublicController::class, 'switchLanguage'])->name('lang.switch');

    // 3. Partners
    Route::get('/partners', [PublicController::class, 'partners'])->name('partners.index');

    // 4. Struktur Organisasi (Pastikan ada di dalam grup ini)
    Route::get('/about/organization-structure', [PublicController::class, 'organization'])->name('about.organization');

    // 5. Programs Group
    Route::prefix('programs')->name('programs.')->group(function () {
        Route::get('/', [PublicController::class, 'programs'])->name('index');
        Route::get('/target/{target}', [PublicController::class, 'programsByTarget'])->name('target');
        Route::get('/{slug}', [PublicController::class, 'show'])->name('show');
    });

});