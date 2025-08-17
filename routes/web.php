<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;

// Login
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Tampilkan form lupa password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password'); // buat view nanti
})->name('password.request');

// Proses kirim email reset password
Route::post('/forgot-password', function (\Illuminate\Http\Request $request) {
    // Contoh: validasi email
    $request->validate(['email' => 'required|email']);
    // Tambahkan logika kirim email reset password sendiri di sini
    return back()->with('success', 'Link reset password dikirim ke email Anda.');
})->name('password.email');


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

Route::prefix('master')->name('template.')->group(function () {
    Route::get('template', [TemplateDokumenController::class, 'index'])->name('index');
    Route::get('template/create', [TemplateDokumenController::class, 'create'])->name('create');
    Route::post('template', [TemplateDokumenController::class, 'store'])->name('store');
    Route::get('template/{id}/edit', [TemplateDokumenController::class, 'edit'])->name('edit');
    Route::put('template/{id}', [TemplateDokumenController::class, 'update'])->name('update');
    Route::delete('template/{id}', [TemplateDokumenController::class, 'destroy'])->name('destroy');
    Route::get('template/{id}/load', [TemplateDokumenController::class, 'loadTemplate'])->name('load');
    Route::post('template/{id}/cetak', [TemplateDokumenController::class, 'cetak'])->name('cetak');
});

// Route Bank
use App\Http\Controllers\Master\BankController;

Route::prefix('master')->middleware(['auth'])->group(function () {
    Route::resource('bank', BankController::class);
});
// Route Pegawai
use App\Http\Controllers\Master\PegawaiController;

// Resource route untuk Pegawai
Route::prefix('master')->middleware(['auth'])->group(function () {
    Route::resource('pegawai', PegawaiController::class)->names([
        'index'   => 'pegawai.index',
        'create'  => 'pegawai.create',
        'store'   => 'pegawai.store',
        'show'    => 'pegawai.show',      // optional, bisa dihapus jika tidak pakai
        'edit'    => 'pegawai.edit',
        'update'  => 'pegawai.update',
        'destroy' => 'pegawai.destroy',
    ]);
});
// Route Dokumen
use App\Http\Controllers\Dokumen\DokumenController;

Route::prefix('dokumen')->name('dokumen.')->group(function () {
    Route::get('dokumen', [DokumenController::class, 'index'])->name('index');
    Route::get('dokumen/create', [DokumenController::class, 'create'])->name('create');
    Route::post('dokumen', [DokumenController::class, 'store'])->name('store');
    Route::get('dokumen/{dokumen}/edit', [DokumenController::class, 'edit'])->name('edit');
    Route::put('dokumen/{dokumen}', [DokumenController::class, 'update'])->name('update');
});
