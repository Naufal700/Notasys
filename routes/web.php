<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route Klien
use App\Http\Controllers\Master\KlienController;

// Group route untuk master/klien dengan prefix dan middleware (opsional)
Route::prefix('master')->name('master.')->group(function () {

    // Klien CRUD
    Route::get('klien', [KlienController::class, 'index'])->name('klien.index');
    Route::get('klien/create', [KlienController::class, 'create'])->name('klien.create');
    Route::post('klien', [KlienController::class, 'store'])->name('klien.store');
    Route::get('klien/{klien}/edit', [KlienController::class, 'edit'])->name('klien.edit');
    Route::put('klien/{klien}', [KlienController::class, 'update'])->name('klien.update');
    Route::delete('klien/{klien}', [KlienController::class, 'destroy'])->name('klien.destroy');

    // Import Excel
    Route::post('klien/import', [KlienController::class, 'import'])->name('klien.import');

    // Export Excel
    Route::get('klien/export', [KlienController::class, 'export'])->name('klien.export');

    // Download template Excel
    Route::get('klien/template', [KlienController::class, 'downloadTemplate'])->name('klien.template');
});
// Route Jenis Akta
use App\Http\Controllers\Master\JenisAktaController;
use App\Http\Controllers\Master\TemplateDokumenController;

Route::prefix('master')->name('master.')->group(function () {
    Route::resource('jenis-akta', JenisAktaController::class);
});
// Route Template Dokumen

// Resource route utama (index, create, store, edit, update, destroy)
Route::resource('template_dokumen', TemplateDokumenController::class);

// Route tambahan untuk download file template
Route::get('template_dokumen/{id}/download', [TemplateDokumenController::class, 'download'])
    ->name('template_dokumen.download');
