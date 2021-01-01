<?php

use App\Http\Controllers\CalonController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilihController;

Route::get('/', [HomeController::class, 'index']);

Auth::routes(['register' => false]);

Route::get('/dashboard', function () {
    return redirect(Auth::user()->role . '/dashboard');
});

Route::prefix('pemilih')->name('pemilih.')->group(function () {
    Route::get('dashboard', [PemilihController::class, 'dashboard'])->name('dashboard');
    Route::get('pilih-calon', [PemilihController::class, 'pilihCalon'])->name('pilih-calon');
    Route::post('submit-calon/{id}', [PemilihController::class, 'submitCalon'])->name('submit-pilihan');
    Route::get('ganti-password', [PemilihController::class, 'gantiPassword'])->name('ganti-password');
    Route::put('save-password', [PemilihController::class, 'savePassword'])->name('save-password');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [CalonController::class, 'dashboard'])->name('dashboard');
    Route::get('lihat-calon', [CalonController::class, 'lihatCalon'])->name('lihat-calon');
    Route::get('tambah-calon', [CalonController::class, 'tambahCalon'])->name('tambah-calon.index');
    Route::post('tambah-calon/post', [CalonController::class, 'submitCalon'])->name(
        'tambah-calon.post'
    );
    Route::delete('hapus-calon/{id}', [CalonController::class, 'hapusCalon'])->name('hapus-calon');
    Route::get('manage-pemilih', [PemilihController::class, 'managePemilih'])->name('manage-pemilih');
    Route::post('tambah-pemilih', [PemilihController::class, 'tambahPemilih'])->name('tambah-pemilih');
    Route::delete('hapus-pemilih/{id}', [pemilihController::class, 'hapuspemilih'])->name('hapus-pemilih');
});

Route::prefix('calon')->name('calon.')->group(function () {
    Route::get('dashboard', [CalonController::class, 'dashboard'])->name('dashboard');
    Route::get('lihat-profile', [CalonController::class, 'lihatProfile'])->name('lihat-profile');
    Route::post('submit-visi-misi', [CalonController::class, 'submitVisiMisi'])->name('submit-visi-misi');
    Route::post('update-foto', [CalonController::class, 'updateFoto'])->name('update-foto');
});
