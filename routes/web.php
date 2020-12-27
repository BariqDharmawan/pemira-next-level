<?php

use App\Http\Controllers\CalonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilihController;

Route::view('/', 'landing');

Auth::routes();

Route::get('pemilih/dashboard', [PemilihController::class, 'dashboard'])->name('dashboard');
Route::get('pilih-calon', [PemilihController::class, 'pilihCalon'])->name('pilih-calon');
Route::post('submit-calon/{id}', [PemilihController::class, 'submitCalon'])->name('submit-pilihan');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [CalonController::class, 'dashboard'])->name('dashboard');
    Route::get('lihat-calon', [CalonController::class, 'lihatCalon'])->name('lihat-calon');
    Route::get('tambah-calon', [CalonController::class, 'tambahCalon'])->name('tambah-calon.index');
    Route::post('tambah-calon/post', [CalonController::class, 'submitCalon'])->name(
        'tambah-calon.post'
    );
});

Route::prefix('calon')->name('calon.')->group(function () {
    Route::get('dashboard', [CalonController::class, 'dashboard'])->name('dashboard');
    Route::get('lihat-profile', [CalonController::class, 'lihatProfile'])->name('lihat-profile');
    Route::post('submit-visi-misi', [CalonController::class, 'submitVisiMisi'])->name('submit-visi-misi');
});
