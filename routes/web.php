<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

// Halaman Utama
Route::get('/', [PublicController::class, 'index'])->name('home');

// Route ganti bahasa
Route::get('lang/{locale}', [PublicController::class, 'switchLanguage'])->name('lang.switch');

// Halaman Semua Program
Route::get('/programs', [PublicController::class, 'programs'])->name('programs.index');

// Halaman Program Berdasarkan Target (mahasiswa, dosen, staff)
Route::get('/programs/target/{target}', [PublicController::class, 'programsByTarget'])->name('programs.target');

// Route detail program
Route::get('/programs/{slug}', [PublicController::class, 'show'])->name('programs.show');

// Route daftar partner
Route::get('/partners', [PublicController::class, 'partners'])->name('partners.index');
