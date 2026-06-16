<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AcaraController;

Route::resource('tikets', TiketController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/acara', [AcaraController::class, 'index'])
        ->name('acara.index');

    Route::get('/acara/create', [AcaraController::class, 'create'])
        ->name('acara.create');

    Route::post('/acara/store', [AcaraController::class, 'store'])
        ->name('acara.store');

    Route::get('/acara/edit/{id}', [AcaraController::class, 'edit'])
        ->name('acara.edit');

    Route::put('/acara/update/{id}', [AcaraController::class, 'update'])
        ->name('acara.update');

    Route::delete('/acara/delete/{id}', [AcaraController::class, 'destroy'])
        ->name('acara.destroy');

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

Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'destroy'])
    ->name('pelanggan.destroy');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])
    ->name('pelanggan.update');

require __DIR__.'/auth.php';
