<?php

use App\Http\Controllers\ManageCalonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemilihController;

Route::view('/', 'landing');

Auth::routes();

Route::get('pemilih/dashboard', [PemilihController::class, 'dashboard'])->name('dashboard');
Route::get('pilih-calon', [PemilihController::class, 'pilihCalon'])->name('pilih-calon');
Route::post('submit-calon/{id}', [PemilihController::class, 'submitCalon'])->name('submit-pilihan');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [ManageCalonController::class, 'dashboard'])->name('dashboard');
    Route::get('lihat-calon', [ManageCalonController::class, 'lihatCalon'])->name('lihat-calon');
    Route::get('tambah-calon', [ManageCalonController::class, 'tambahCalon'])
        ->name('tambah-calon.index');
    Route::post('tambah-calon/post', [ManageCalonController::class, 'submitCalon'])
        ->name('tambah-calon.post');
});
