<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TiketController;

Route::resource('tikets', TiketController::class);

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboardAdm');
})->middleware(['auth', 'checkRole:A'])
  ->name('admin.dashboard');

Route::get('/user/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'checkRole:U'])
  ->name('user.dashboard');

Route::get('/pelanggan', [PelangganController::class, 'index'])
    ->name('pelanggan.index');
    
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])
        ->name('pelanggan.edit');

    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])
        ->name('pelanggan.update');

    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])
        ->name('pelanggan.destroy');
require __DIR__.'/auth.php';
